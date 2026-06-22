// Generate English hero banner via OpenAI Images API (gpt-image-2)
const fs = require("fs");

function loadKey() {
  const env = fs.readFileSync(".env", "utf-8");
  for (const line of env.split(/\r?\n/)) {
    const t = line.trim();
    if (t.startsWith("OPENAI_API_KEY=")) return t.slice("OPENAI_API_KEY=".length).trim();
  }
  throw new Error("OPENAI_API_KEY missing in .env");
}

async function main() {
  const promptPath = process.argv[2];
  const outPath = process.argv[3];
  const prompt = fs.readFileSync(promptPath, "utf-8");
  const apiKey = loadKey();

  const resp = await fetch("https://api.openai.com/v1/images/generations", {
    method: "POST",
    headers: {
      Authorization: `Bearer ${apiKey}`,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      model: "gpt-image-2",
      prompt,
      size: "1536x1024",
      quality: "high",
      output_format: "png",
    }),
  });

  if (!resp.ok) {
    const body = await resp.text();
    console.error("HTTP", resp.status, body);
    process.exit(1);
  }

  const data = await resp.json();
  const b64 = data.data[0].b64_json;
  fs.writeFileSync(outPath, Buffer.from(b64, "base64"));
  console.log("saved:", outPath);
}

main().catch((e) => {
  console.error("ERR", e);
  process.exit(1);
});
