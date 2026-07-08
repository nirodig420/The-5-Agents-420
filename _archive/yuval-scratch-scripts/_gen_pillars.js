// Pillar image set generator — NIRO EN automation page
// Reads OPENAI_API_KEY from .env, calls OpenAI Images API (gpt-image-2),
// decodes b64_json, writes PNG + sibling .txt prompt for each pillar.
const fs = require("fs");
const path = require("path");
const https = require("https");

const ROOT = path.resolve(__dirname, "..", "..");
const OUT = __dirname;

// --- load OPENAI_API_KEY from .env ---
let apiKey = "";
for (const line of fs.readFileSync(path.join(ROOT, ".env"), "utf8").split(/\r?\n/)) {
  const t = line.trim();
  if (t.startsWith("OPENAI_API_KEY=")) { apiKey = t.slice("OPENAI_API_KEY=".length).trim(); break; }
}
if (!apiKey) { console.error("OPENAI_API_KEY missing in .env"); process.exit(1); }

// Shared design-language preamble — guarantees the 5 read as one family.
const STYLE = `Premium abstract conceptual B2B tech illustration, dark navy background (#0b1f5b base), soft glowing nodes and connected light-lines, soft purple-periwinkle accent (#8B7FE8), refined gold highlights (#FFD700) used sparingly. Minimal, sophisticated, cinematic studio lighting, subtle depth of field, sense of effortless control and forward momentum, aspirational "winners" mood. No people, no faces, no text, no letters, no logos, no UI screenshots. Clean negative space, elegant composition, suitable as a wide landscape card header. Cohesive identical lighting and rendering treatment across the series.`;

const pillars = [
  {
    slug: "2026-06-18-pillar-ai-agents",
    desc: "AI Agents (flagship) — a digital team that never sleeps; force multiplier.",
    prompt: `${STYLE} CONCEPT: A team of intelligent AI agents working in unison as a force multiplier — several glowing autonomous orb-like agent forms arranged in an elegant constellation, each radiating a soft periwinkle glow, connected by luminous gold threads to a central command core. Conveys a tireless digital workforce amplifying a single business: depth, coordination, quiet power. The flagship hero image — most luminous and commanding of the set.`,
  },
  {
    slug: "2026-06-18-pillar-make",
    desc: "Make Automations — connected systems, a workflow of nodes with information flowing through.",
    prompt: `${STYLE} CONCEPT: A flowing automation workflow — sleek interconnected nodes linked by smooth glowing periwinkle pathways, small pulses of light traveling along the lines from node to node showing data moving by itself between systems. Branching paths suggest smart routing and conditions. Apps as abstract islands becoming one connected, automated current.`,
  },
  {
    slug: "2026-06-18-pillar-manychat",
    desc: "ManyChat Chatbots — automated chat conversation, instant reply across Messenger/IG/WhatsApp.",
    prompt: `${STYLE} CONCEPT: Automated conversation — abstract glowing speech-bubble shapes flowing in an elegant exchange, light pulses passing instantly between them suggesting immediate auto-replies. A sense of many simultaneous conversations handled effortlessly across channels, threads of periwinkle light weaving the bubbles together. Instant, responsive, always-on.`,
  },
  {
    slug: "2026-06-18-pillar-crm",
    desc: "CRM Systems (Airtable) — leads flowing into one organized, structured place; control.",
    prompt: `${STYLE} CONCEPT: Organized control — scattered glowing lead-particles from many directions flowing inward and snapping into a clean, structured luminous grid/pipeline, each settling into an ordered place. Conveys chaos becoming order, one tidy home for every lead, full pipeline visibility and calm command. Soft gold highlights marking key records.`,
  },
  {
    slug: "2026-06-18-pillar-ai-chatbots",
    desc: "AI Chatbots — smart 24/7 assistant that answers and sells.",
    prompt: `${STYLE} CONCEPT: A smart always-on AI assistant — a single elegant glowing neural core radiating soft periwinkle light, gentle concentric rings suggesting 24/7 availability and intelligence, fine gold neural filaments branching outward as it understands and responds. Conveys a knowledgeable digital helper working through the night, calm and capable.`,
  },
];

function genOne(p) {
  return new Promise((resolve, reject) => {
    const body = JSON.stringify({
      model: "gpt-image-2",
      prompt: p.prompt,
      size: "1536x1024",
      quality: "high",
      output_format: "png",
    });
    const req = https.request({
      hostname: "api.openai.com",
      path: "/v1/images/generations",
      method: "POST",
      headers: {
        Authorization: `Bearer ${apiKey}`,
        "Content-Type": "application/json",
        "Content-Length": Buffer.byteLength(body),
      },
    }, (res) => {
      let chunks = "";
      res.on("data", (d) => (chunks += d));
      res.on("end", () => {
        try {
          const j = JSON.parse(chunks);
          if (!j.data || !j.data[0] || !j.data[0].b64_json) {
            return reject(new Error(`No image data for ${p.slug}: ${chunks.slice(0, 500)}`));
          }
          const png = Buffer.from(j.data[0].b64_json, "base64");
          fs.writeFileSync(path.join(OUT, p.slug + ".png"), png);
          fs.writeFileSync(path.join(OUT, p.slug + ".txt"), p.prompt, "utf8");
          console.log(`OK ${p.slug}.png  (${png.length} bytes)`);
          resolve();
        } catch (e) { reject(new Error(`${p.slug}: ${e.message} :: ${chunks.slice(0,300)}`)); }
      });
    });
    req.on("error", reject);
    req.write(body);
    req.end();
  });
}

(async () => {
  for (const p of pillars) {
    try { await genOne(p); }
    catch (e) { console.error("FAIL", e.message); process.exitCode = 1; }
  }
})();
