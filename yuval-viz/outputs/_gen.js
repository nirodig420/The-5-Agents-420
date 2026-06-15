// gpt-image-gen wrapper (Node, no deps). Usage: node _gen.js <promptFile> <outPath> <size>
const fs = require("fs");
const https = require("https");
const path = require("path");

const root = path.resolve(__dirname, "..", "..");
const envPath = path.join(root, ".env");

let apiKey = "";
for (const line of fs.readFileSync(envPath, "utf8").split(/\r?\n/)) {
  const t = line.trim();
  if (t.startsWith("OPENAI_API_KEY=")) { apiKey = t.slice("OPENAI_API_KEY=".length).trim(); break; }
}
if (!apiKey) { console.error("OPENAI_API_KEY missing in .env"); process.exit(1); }

const promptFile = process.argv[2];
const outPath = process.argv[3];
const size = process.argv[4] || "1024x1024";
const prompt = fs.readFileSync(promptFile, "utf8");

const payload = JSON.stringify({
  model: "gpt-image-2",
  prompt,
  size,
  quality: "high",
  output_format: "png",
});

const req = https.request({
  hostname: "api.openai.com",
  path: "/v1/images/generations",
  method: "POST",
  headers: {
    "Authorization": "Bearer " + apiKey,
    "Content-Type": "application/json",
    "Content-Length": Buffer.byteLength(payload),
  },
}, (res) => {
  let chunks = [];
  res.on("data", (c) => chunks.push(c));
  res.on("end", () => {
    const body = Buffer.concat(chunks).toString("utf8");
    if (res.statusCode !== 200) { console.error("HTTP " + res.statusCode + ": " + body.slice(0, 800)); process.exit(2); }
    let data;
    try { data = JSON.parse(body); } catch (e) { console.error("Parse error: " + body.slice(0, 400)); process.exit(3); }
    const b64 = data && data.data && data.data[0] && data.data[0].b64_json;
    if (!b64) { console.error("No b64_json: " + body.slice(0, 400)); process.exit(4); }
    fs.writeFileSync(outPath, Buffer.from(b64, "base64"));
    console.log("SAVED " + outPath);
  });
});
req.on("error", (e) => { console.error("REQ ERR " + e.message); process.exit(5); });
req.write(payload);
req.end();
