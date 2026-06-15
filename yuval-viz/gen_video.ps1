param(
    [Parameter(Mandatory=$true)][string]$EnvPath,
    [Parameter(Mandatory=$true)][string]$PromptPath,
    [Parameter(Mandatory=$true)][string]$OutPath,
    [string]$Model = "sora-2-pro",
    [string]$Size = "720x1280",
    [string]$Seconds = "4",
    [string]$InputReference = ""
)

$ErrorActionPreference = "Stop"

# --- 1. load OPENAI_API_KEY from .env ---
$apiKey = ""
foreach ($line in Get-Content $EnvPath) {
    $t = $line.Trim()
    if ($t.StartsWith("OPENAI_API_KEY=")) {
        $apiKey = $t.Substring("OPENAI_API_KEY=".Length).Trim()
        break
    }
}
if ([string]::IsNullOrWhiteSpace($apiKey)) { throw "OPENAI_API_KEY missing in .env" }

# --- 2. read prompt ---
$prompt = (Get-Content -Raw -Encoding UTF8 $PromptPath).Trim()

# --- 3. build multipart/form-data body ---
$boundary = "----WebKitFormBoundary" + [System.Guid]::NewGuid().ToString("N")
$LF = "`r`n"
$enc = [System.Text.Encoding]::UTF8
$parts = New-Object System.Collections.ArrayList

function Add-Field($name, $value) {
    $s = "--$boundary$LF" + "Content-Disposition: form-data; name=`"$name`"$LF$LF" + "$value$LF"
    [void]$parts.Add($enc.GetBytes($s))
}
Add-Field "model"   $Model
Add-Field "prompt"  $prompt
Add-Field "size"    $Size
Add-Field "seconds" $Seconds

if ($InputReference -ne "") {
    $fileBytes = [IO.File]::ReadAllBytes($InputReference)
    $fileName  = [IO.Path]::GetFileName($InputReference)
    $header = "--$boundary$LF" + "Content-Disposition: form-data; name=`"input_reference`"; filename=`"$fileName`"$LF" + "Content-Type: image/png$LF$LF"
    [void]$parts.Add($enc.GetBytes($header))
    [void]$parts.Add($fileBytes)
    [void]$parts.Add($enc.GetBytes($LF))
}
[void]$parts.Add($enc.GetBytes("--$boundary--$LF"))

$ms = New-Object System.IO.MemoryStream
foreach ($p in $parts) { $ms.Write($p, 0, $p.Length) }
$bodyBytes = $ms.ToArray()
$ms.Dispose()

# --- 4. create job ---
$resp = Invoke-RestMethod -Method Post -Uri "https://api.openai.com/v1/videos" `
    -Headers @{ "Authorization" = "Bearer $apiKey" } `
    -ContentType "multipart/form-data; boundary=$boundary" `
    -Body $bodyBytes
$videoId = $resp.id
Write-Output "video_id=$videoId status=$($resp.status)"

# --- 5. poll until completed ---
while ($true) {
    Start-Sleep -Seconds 10
    $st = Invoke-RestMethod -Method Get -Uri "https://api.openai.com/v1/videos/$videoId" `
        -Headers @{ "Authorization" = "Bearer $apiKey" }
    Write-Output "status=$($st.status) progress=$($st.progress)"
    if ($st.status -eq "completed") { break }
    if ($st.status -eq "failed") { throw "Video generation failed: $($st | ConvertTo-Json -Depth 6)" }
}

# --- 6. download MP4 ---
Invoke-WebRequest -Uri "https://api.openai.com/v1/videos/$videoId/content" `
    -Headers @{ "Authorization" = "Bearer $apiKey" } -OutFile $OutPath
Write-Output "SAVED: $OutPath"
