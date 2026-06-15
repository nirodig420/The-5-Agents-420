param(
    [Parameter(Mandatory=$true)][string]$EnvPath,
    [Parameter(Mandatory=$true)][string]$PromptPath,
    [Parameter(Mandatory=$true)][string]$OutPath,
    [string]$Size = "1024x1024"
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

# --- 3. build payload ---
$payload = @{
    model         = "gpt-image-2"
    prompt        = $prompt
    size          = $Size
    quality       = "high"
    output_format = "png"
} | ConvertTo-Json

# --- 4. call API ---
$resp = Invoke-RestMethod -Method Post `
    -Uri "https://api.openai.com/v1/images/generations" `
    -Headers @{ "Authorization" = "Bearer $apiKey" } `
    -ContentType "application/json" `
    -Body ([System.Text.Encoding]::UTF8.GetBytes($payload))

# --- 5. decode b64 -> PNG ---
$b64 = $resp.data[0].b64_json
[IO.File]::WriteAllBytes($OutPath, [Convert]::FromBase64String($b64))
Write-Output "SAVED: $OutPath"
