<?php /* Template Name: English Homepage */ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NXRL4W23');</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="We build your automation engine: AI agents, CRM & lead automation with Make — plus digital marketing. Less manual work, more sales. Let's talk.">
    <meta property="og:title" content="Business Automation, AI Agents & CRM | Nirodigital">
    <meta property="og:description" content="Build a business that outworks its size. A digital team of automations and AI agents that works around the clock - so you produce like a company twice your size.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png">
    <meta property="og:url" content="https://www.nirodigital.co.il/en/">

    <link rel="alternate" hreflang="he" href="https://www.nirodigital.co.il/" />
    <link rel="alternate" hreflang="en" href="https://www.nirodigital.co.il/en/" />

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Niro Digital Marketing",
      "image": "https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png",
      "description": "Automations and AI agents for growing businesses. We build the systems that capture every lead, answer customers around the clock, and take the repetitive work off your plate.",
      "url": "https://www.nirodigital.co.il/en/",
      "telephone": "+972537142298",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "IL"
      },
      "sameAs": [
        "https://www.facebook.com/profile.php?id=61578880211111",
        "https://www.instagram.com/nvb.1982/"
      ]
    }
    </script>

    <title>Business Automation, AI Agents & CRM | Nirodigital</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --blue: #0b1f5b;
            --red: #e6463a;
            --auto: #8B7FE8;        /* automation / AI accent - soft periwinkle violet */
            --auto-deep: #6C5DD3;   /* deeper violet for text on light bg */
            --auto-glow: rgba(139,127,232,0.45);
            --wa: #25D366;
            --dark: #0a1020;
            --gold: #FFD700;
            --fb: #1877F2;
            --ig: #E4405F;
            --light-bg: #f4f7fa;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: 'Heebo', sans-serif;
            background: var(--dark);
            color: #fff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        body.grayscale { filter: grayscale(100%) contrast(120%); }

        /* Header Styling - LTR */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 110px;
            background: rgba(10,16,32,0.95);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            z-index: 1000;
            backdrop-filter: blur(5px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        /* Header logo: the original NIRO smiley logo, shown whole and clean. */
        header img.logo {
            height: 85px;
            width: auto;
            display: block;
        }

        .nav-area { display: flex; align-items: center; gap: 20px; }

        .nav-menu { display: flex; align-items: center; }
        .dropdown { position: relative; display: inline-block; padding: 20px 0; }

        .nav-link {
            color: #fff;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .nav-link:hover { color: var(--red); }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            min-width: 240px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            border-radius: 8px;
            z-index: 1001;
            overflow: hidden;
            margin-top: -10px;
            animation: fadeIn 0.3s ease;
            border-top: 3px solid var(--red);
        }

        .dropdown:hover .dropdown-content { display: block; }

        .dropdown-content a {
            color: var(--blue);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 15px;
            border-bottom: 1px solid #f0f0f0;
            text-align: left;
            transition: 0.2s;
        }
        .dropdown-content a:hover { background-color: #f9f9f9; color: var(--red); padding-left: 20px; }
        .dropdown-content a:last-child { border-bottom: none; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header CTA button */
        .nav-cta {
            background: var(--red);
            color: #fff !important;
            padding: 11px 22px !important;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(230,70,58,0.35);
            margin-left: 10px;
        }
        .nav-cta:hover { background: #c5352b; color: #fff !important; transform: translateY(-2px); }

        .header-social { display: flex; gap: 12px; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 20px; }
        .header-social a { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; font-size: 16px; transition: 0.3s; }
        .hs-fb { background: var(--fb); }
        .hs-ig { background: var(--ig); }
        .header-social a:hover { transform: translateY(-3px); opacity: 0.9; }

        .lang-btn { color: var(--gold); border: 1px solid var(--gold); padding: 5px 15px !important; border-radius: 20px; }
        .lang-btn:hover { background: var(--gold); color: var(--dark) !important; }

        /* ===== HERO ===== */
        /* Niro's branded banner IS the hero. Shown whole + full-width (contain), CTAs centered beneath. */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 150px 40px 70px;
            background-color: var(--dark);
            overflow: hidden;
        }
        /* soft violet automation glow behind the banner for subtle depth */
        .hero::after {
            content: "";
            position: absolute;
            top: -120px; right: -120px;
            width: 480px; height: 480px;
            background: radial-gradient(circle, var(--auto-glow) 0%, rgba(0,194,168,0.10) 45%, transparent 70%);
            opacity: 0.4;
            pointer-events: none;
            z-index: 1;
        }
        .hero-inner { position: relative; z-index: 2; width: 100%; max-width: 1280px; text-align: center; }
        /* The banner: full available width, never cropped, scales down responsively */
        .hero-banner {
            display: block;
            width: 100%;
            max-width: 1100px;
            height: auto;
            margin: 0 auto;
            object-fit: contain;
        }
        /* English hero copy block - sits beneath the banner, centered, breathing room above */
        .hero-copy { margin-top: 40px; }
        .hero-title {
            font-size: 56px;
            font-weight: 900;
            line-height: 1.1;
            margin: 0 auto;
            max-width: 880px;
            letter-spacing: -0.5px;
        }
        .hero-title .hl { color: var(--auto); }
        .hero-divider {
            display: block;
            width: 90px; height: 4px;
            margin: 26px auto 24px;
            border-radius: 4px;
            background: linear-gradient(90deg, var(--auto-deep), var(--auto));
            box-shadow: 0 0 16px var(--auto-glow);
        }
        .hero-sub {
            font-size: 20px;
            line-height: 1.65;
            color: #d7deee;
            max-width: 720px;
            margin: 0 auto;
            opacity: 0.95;
        }
        .eyebrow {
            display: inline-block;
            color: var(--auto);
            font-weight: 800;
            font-size: 15px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 22px;
            padding: 7px 16px;
            border: 1px solid rgba(139,127,232,0.45);
            border-radius: 30px;
            background: rgba(139,127,232,0.06);
        }
        .eyebrow::before { content: "\f5dc"; font-family: "Font Awesome 6 Free"; font-weight: 900; margin-right: 9px; }
        .hero-cta-row { display: flex; flex-wrap: wrap; gap: 18px; margin-top: 38px; align-items: center; justify-content: center; }

        .btn-primary {
            background: var(--red);
            color: #fff;
            padding: 18px 38px;
            border-radius: 14px;
            font-weight: 800;
            font-size: 18px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(230,70,58,0.4);
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-family: 'Heebo';
        }
        .btn-primary:hover { background: #c5352b; transform: translateY(-4px); box-shadow: 0 14px 35px rgba(230,70,58,0.55); }

        .btn-wa-text {
            color: #fff;
            padding: 16px 28px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 17px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 2px solid rgba(255,255,255,0.25);
            transition: 0.3s;
        }
        .btn-wa-text:hover { border-color: var(--wa); color: var(--wa); transform: translateY(-3px); }
        .btn-wa-text i { color: var(--wa); font-size: 20px; }

        /* ===== TRUST / TECH-STACK STRIP ===== */
        .trust-strip {
            background: #070b16;
            padding: 34px 60px;
            border-top: 1px solid rgba(139,127,232,0.10);
            border-bottom: 1px solid rgba(139,127,232,0.10);
        }
        .trust-inner { max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 22px 48px; }
        .trust-label {
            color: var(--auto);
            font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase;
            display: inline-flex; align-items: center; gap: 9px;
        }
        .trust-label::before { content: "\f1e6"; font-family: "Font Awesome 6 Free"; font-weight: 900; }
        .trust-logos { display: flex; flex-wrap: wrap; gap: 18px 38px; align-items: center; justify-content: center; }
        .tech-logo {
            display: inline-flex; align-items: center; gap: 10px;
            opacity: 0.75; transition: 0.3s;
            filter: grayscale(35%);
        }
        .tech-logo:hover { opacity: 1; filter: grayscale(0%); transform: translateY(-2px); }
        .tech-logo img { height: 26px; width: auto; display: block; }
        .tech-logo .tech-name { color: #cfd6e6; font-weight: 800; font-size: 16px; letter-spacing: 0.3px; }
        /* text fallback badge (e.g. ManyChat - no simpleicons slug) */
        .tech-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px; border-radius: 10px;
            background: rgba(139,127,232,0.08);
            border: 1px solid rgba(139,127,232,0.28);
            color: #eafffb; font-weight: 800; font-size: 15px;
            opacity: 0.85; transition: 0.3s;
        }
        .tech-badge:hover { opacity: 1; background: rgba(139,127,232,0.14); transform: translateY(-2px); }
        .tech-badge i { color: var(--auto); font-size: 15px; }

        /* Section Commons */
        section { padding: 100px 80px; }
        .reveal { opacity: 0; transform: translateY(40px); transition: 1s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .sec-head { max-width: 860px; margin: 0 auto 60px; text-align: center; }
        .sec-head .eyebrow { color: var(--red); border-color: rgba(230,70,58,0.4); }
        .sec-head h2 { font-size: 48px; font-weight: 900; margin: 0 0 16px; line-height: 1.15; }
        .sec-head p { font-size: 20px; opacity: 0.85; margin: 0; }

        /* ===== VALUE / FRAMING ===== */
        .value { background: var(--blue); position: relative; overflow: hidden; }
        .value-wrap { max-width: 1000px; margin: 0 auto; text-align: center; }
        .value h2 { font-size: 42px; font-weight: 900; margin-bottom: 24px; line-height: 1.2; }
        .value h2 span { color: var(--gold); }
        .value p { font-size: 21px; opacity: 0.92; max-width: 820px; margin: 0 auto 18px; }

        /* ===== PILLARS ===== */
        .pillars { background: #fff; color: var(--blue); }
        .pillars .sec-head h2 { color: var(--blue); }
        .pillars .sec-head p { color: #5b6478; }
        .pillar-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 28px; max-width: 1200px; margin: 0 auto; }
        .pillar {
            background: #fff;
            border-radius: 22px;
            border: 1px solid #e8ecf2;
            text-align: left;
            box-shadow: 0 10px 30px rgba(11,31,91,0.06);
            transition: 0.4s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .pillar:hover { transform: translateY(-12px); box-shadow: 0 24px 48px rgba(11,31,91,0.14); border-color: var(--auto); }

        /* Pillar image header - topical visual on a dark base, with violet/dark overlay so the icon + title stay readable */
        .pillar-media {
            position: relative;
            height: 168px;
            overflow: hidden;
            background: var(--dark);
        }
        .pillar-media img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        .pillar:hover .pillar-media img { transform: scale(1.06); }
        .pillar-media::after {
            content: "";
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(11,31,91,0.25) 0%, rgba(10,16,32,0.55) 100%);
            pointer-events: none;
        }
        .pillar-body { padding: 30px 30px 34px; display: flex; flex-direction: column; flex-grow: 1; }
        /* icon floats up onto the image header so it bridges the visual and the card */
        .pillar-media + .pillar-body { padding-top: 0; }
        .pillar-media + .pillar-body .pillar-icon { margin-top: -36px; position: relative; z-index: 2; box-shadow: 0 8px 22px rgba(11,31,91,0.28); border: 3px solid #fff; }
        .pillar-icon {
            width: 64px; height: 64px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--blue), var(--auto-deep));
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; color: #fff;
            margin-bottom: 22px;
        }
        .pillar h3 { font-size: 23px; font-weight: 900; margin: 0 0 6px; color: var(--blue); }
        .pillar .pillar-tagline { color: var(--auto-deep); font-weight: 700; font-size: 15px; margin-bottom: 14px; display: block; }
        .pillar p { font-size: 16px; color: #4a5468; margin: 0 0 18px; line-height: 1.7; flex-grow: 1; }
        .pillar .read-more-btn { color: var(--blue); font-weight: 800; font-size: 14px; text-decoration: underline; align-self: flex-start; }

        /* Flagship pillar - AI Agents (automation = cyan) */
        .pillar.flagship {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, var(--blue) 0%, var(--dark) 100%);
            color: #fff;
            border: 2px solid var(--auto);
            display: block;
            position: relative;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(0,0,0,0.4), 0 0 0 1px rgba(139,127,232,0.15);
        }
        /* Flagship hero image band - the hero gets a wide, prominent visual presence */
        .flagship-media {
            position: relative;
            height: 260px;
            overflow: hidden;
            background: var(--dark);
        }
        .flagship-media img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .pillar.flagship:hover .flagship-media img { transform: scale(1.05); }
        /* gradient fades the image into the dark card body + keeps the badge readable */
        .flagship-media::after {
            content: "";
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(11,31,91,0.30) 0%, rgba(11,31,91,0.55) 55%, var(--blue) 100%);
            pointer-events: none;
        }
        .flagship-content {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 40px;
            align-items: center;
            padding: 40px 44px 48px;
            position: relative;
        }
        /* lift the flagship icon up onto the image band */
        .pillar.flagship .flagship-content .pillar-icon { margin-top: -76px; position: relative; z-index: 2; }
        /* cyan glow accent inside the flagship card body */
        .flagship-content::after {
            content: "";
            position: absolute;
            top: -100px; right: -80px;
            width: 360px; height: 360px;
            background: radial-gradient(circle, var(--auto-glow) 0%, transparent 65%);
            opacity: 0.30; pointer-events: none; z-index: 0;
        }
        .flagship-content > * { position: relative; z-index: 1; }
        .pillar.flagship:hover { transform: translateY(-8px); box-shadow: 0 28px 60px rgba(0,0,0,0.45), 0 0 30px var(--auto-glow); border-color: var(--auto); }
        .pillar.flagship h3 { color: #fff; font-size: 32px; }
        .pillar.flagship .pillar-tagline { color: var(--auto); font-size: 17px; }
        .pillar.flagship p { color: #d7deee; font-size: 18px; }
        .pillar.flagship .pillar-icon { background: linear-gradient(135deg, var(--auto), var(--auto-deep)); color: var(--dark); width: 72px; height: 72px; font-size: 32px; box-shadow: 0 0 24px var(--auto-glow); }
        .flagship-badge {
            position: absolute; top: 24px; right: 28px; z-index: 2;
            background: var(--auto); color: var(--dark);
            font-weight: 900; font-size: 12px; letter-spacing: 1px;
            padding: 6px 14px; border-radius: 20px; text-transform: uppercase;
            box-shadow: 0 0 18px var(--auto-glow);
        }
        .flagship-right { display: flex; flex-direction: column; gap: 14px; }
        .agent-chip {
            background: rgba(139,127,232,0.07);
            border: 1px solid rgba(139,127,232,0.22);
            border-radius: 14px;
            padding: 16px 18px;
            display: flex; align-items: center; gap: 14px;
            font-weight: 700; font-size: 16px; color: #fff;
            transition: 0.3s;
        }
        .agent-chip:hover { background: rgba(139,127,232,0.13); border-color: var(--auto); }
        .agent-chip i { color: var(--auto); font-size: 20px; width: 24px; text-align: center; }
        .pillar.flagship .read-more-btn { color: var(--auto); }

        /* clickable agent chips - each opens its own detail modal */
        .agent-chip.clickable { cursor: pointer; position: relative; padding-right: 16px; }
        .agent-chip.clickable .chip-label { flex: 1; }
        .agent-chip.clickable .chip-more {
            display: inline-flex; align-items: center; gap: 5px;
            flex-shrink: 0; white-space: nowrap;
            color: var(--auto); font-size: 12.5px; font-weight: 800;
            letter-spacing: 0.4px; opacity: 0.75;
            transition: 0.3s; margin-left: 6px;
        }
        .agent-chip.clickable .chip-more i { font-size: 12px; width: auto; color: var(--auto); transition: transform 0.3s; }
        .agent-chip.clickable:hover {
            background: rgba(139,127,232,0.18);
            border-color: var(--auto);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(139,127,232,0.22);
        }
        .agent-chip.clickable:hover .chip-more { opacity: 1; }
        .agent-chip.clickable:hover .chip-more i { transform: translateX(4px); }
        @media (max-width: 600px) {
            .agent-chip.clickable .chip-more span { display: none; }
        }

        /* ===== MID-PAGE CTA BANNER ===== */
        .cta-banner {
            background: radial-gradient(circle at center, #1a2a5a 0%, var(--dark) 80%);
            text-align: center;
        }
        .cta-banner h2 { font-size: 40px; font-weight: 900; margin: 0 0 14px; }
        .cta-banner p { font-size: 20px; opacity: 0.85; max-width: 720px; margin: 0 auto 30px; }
        .cta-banner .micro { font-size: 16px; color: var(--gold); font-weight: 700; margin-top: 20px; }
        /* NiroFlow brand signature - shown WHOLE (no crop) as a clean badge on the dark CTA banner */
        .brand-signature { display: flex; flex-direction: column; align-items: center; gap: 12px; margin: 0 auto 34px; }
        .brand-signature .bs-label { font-size: 13px; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,0.6); font-weight: 700; }
        .brand-signature img {
            width: 130px;
            height: auto;
            display: block;
            border-radius: 18px;
            box-shadow: 0 14px 40px rgba(230,70,58,0.35), 0 0 0 1px rgba(255,255,255,0.08);
        }
        @media (max-width: 768px) {
            .brand-signature img { width: 108px; }
        }

        /* ===== HOW IT WORKS ===== */
        .how { background: var(--light-bg); color: var(--blue); }
        .how .sec-head h2 { color: var(--blue); }
        .how .sec-head p { color: #5b6478; }
        .steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 26px; max-width: 1200px; margin: 0 auto; }
        .step {
            background: #fff; border-radius: 20px; padding: 34px 28px;
            box-shadow: 0 10px 30px rgba(11,31,91,0.06); position: relative;
            border: 1px solid #e8ecf2; transition: 0.3s;
        }
        .step:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(11,31,91,0.12); }
        .step-num {
            width: 52px; height: 52px; border-radius: 50%;
            background: var(--red); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 900; font-size: 22px; margin-bottom: 18px;
        }
        .step h3 { font-size: 21px; font-weight: 900; margin: 0 0 10px; color: var(--blue); }
        .step p { font-size: 16px; color: #4a5468; margin: 0; line-height: 1.7; }

        /* ===== PROOF / TRUST BLOCK ===== */
        .proof { background: #fff; color: var(--blue); }
        .proof .sec-head h2 { color: var(--blue); }
        .proof .sec-head p { color: #5b6478; }
        .proof-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; }
        .proof-card {
            background: var(--light-bg); border-radius: 18px; padding: 30px 26px;
            border: 1px solid #e8ecf2; transition: 0.3s;
        }
        .proof-card:hover { border-color: var(--red); transform: translateY(-6px); }
        .proof-card i { font-size: 30px; color: var(--red); margin-bottom: 16px; }
        .proof-card h3 { font-size: 19px; font-weight: 900; margin: 0 0 8px; color: var(--blue); }
        .proof-card p { font-size: 15px; color: #4a5468; margin: 0; line-height: 1.65; }

        /* ===== TESTIMONIALS ===== */
        .testimonials { background: var(--dark); text-align: center; }
        .t-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 50px; max-width: 1200px; margin: 80px auto; }
        .t-card { background: #fff; padding: 50px 30px 30px; border-radius: 20px; color: var(--blue); text-align: left; position: relative; margin-top: 40px; }
        .t-card img.t-logo { width: 80px; height: 80px; border-radius: 50%; position: absolute; top: -40px; left: 30px; border: 4px solid var(--dark); background: #fff; object-fit: cover; }
        .t-stars { color: var(--gold); margin-bottom: 15px; font-size: 18px; }
        .t-name { font-weight: 900; display: block; font-size: 20px; color: var(--blue); }
        .t-role { color: var(--red); font-weight: 700; font-size: 15px; margin-bottom: 15px; display: block; }
        .t-card p { font-size: 16px; color: #444; line-height: 1.7; }

        /* ===== MARKETING ADD-ONS (secondary) ===== */
        .addons { background: var(--blue); }
        .addons .sec-head h2 { color: #fff; }
        .addons .sec-head p { color: rgba(255,255,255,0.8); }
        .addon-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 22px; max-width: 1050px; margin: 0 auto; }
        .addon {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px; padding: 28px 24px; cursor: pointer;
            transition: 0.3s; text-align: left;
        }
        .addon:hover { background: rgba(255,255,255,0.1); border-color: var(--gold); transform: translateY(-6px); }
        .addon i { font-size: 26px; color: var(--gold); margin-bottom: 14px; }
        .addon h3 { font-size: 19px; font-weight: 800; margin: 0 0 8px; color: #fff; }
        .addon p { font-size: 15px; color: rgba(255,255,255,0.75); margin: 0 0 12px; line-height: 1.6; }
        .addon .read-more-btn { color: var(--gold); font-weight: 800; font-size: 13px; text-decoration: underline; }

        /* ===== FAQ ===== */
        .faq-section { background: var(--light-bg); color: var(--blue); }
        .faq-container { max-width: 900px; margin: 0 auto; }
        .faq-item { background: #fff; margin-bottom: 15px; border-radius: 12px; border: 1px solid #eee; overflow: hidden; transition: 0.3s; }
        .faq-question { padding: 20px 25px; font-weight: 800; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }
        .faq-question span { font-size: 24px; color: var(--red); transition: 0.3s; }
        .faq-answer { padding: 0 25px; max-height: 0; overflow: hidden; transition: 0.4s ease; color: #555; font-size: 17px; }
        .faq-item.active { border-color: var(--red); box-shadow: 0 5px 15px rgba(230,70,58,0.1); }
        .faq-item.active .faq-answer { padding: 0 25px 20px; max-height: 320px; }
        .faq-item.active .faq-question span { transform: rotate(45deg); }

        /* ===== CLOSING CTA / CONTACT ===== */
        .contact { background: radial-gradient(circle at 70% 30%, #1a2a5a 0%, var(--blue) 75%); }
        .contact-wrap { max-width: 1150px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .contact-copy .eyebrow { color: var(--gold); border-color: rgba(255,215,0,0.4); }
        .contact-copy h2 { font-size: 44px; font-weight: 900; margin: 0 0 16px; line-height: 1.15; }
        .contact-copy .closing-line { font-size: 22px; color: var(--gold); font-weight: 800; margin: 0 0 22px; line-height: 1.4; }
        .contact-copy p { font-size: 18px; opacity: 0.9; margin: 0 0 14px; }
        .contact-copy ul { list-style: none; padding: 0; margin: 24px 0 0; }
        .contact-copy li { font-size: 17px; margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px; }
        .contact-copy li i { color: var(--gold); margin-top: 4px; }

        .contact-box { background: #fff; padding: 42px; border-radius: 28px; color: var(--blue); box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .contact-box h3 { text-align: center; font-weight: 900; font-size: 26px; margin: 0 0 6px; }
        .contact-box .form-sub { text-align: center; color: #5b6478; font-size: 15px; margin: 0 0 26px; }
        .form-group { margin-bottom: 18px; }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 2px solid #eee;
            font-family: 'Heebo';
            font-size: 16px;
            transition: 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus { border-color: var(--red); outline: none; background: #fff9f9; }
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: var(--red);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(230,70,58,0.3);
        }
        .submit-btn:hover { background: #c5352b; transform: translateY(-3px); }
        .contact-box .wa-fallback { text-align: center; margin-top: 18px; font-size: 14px; color: #5b6478; }
        .contact-box .wa-fallback a { color: var(--wa); font-weight: 800; text-decoration: none; }

        /* ===== MODALS ===== */
        .modal-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.85); z-index: 5000; display: none;
            align-items: center; justify-content: center; padding: 20px;
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background: #fff; width: 100%; max-width: 700px; border-radius: 25px;
            padding: 40px; position: relative; color: var(--blue);
            max-height: 90vh; overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5); animation: zoomIn 0.3s ease;
        }
        @keyframes zoomIn { from { transform: scale(0.8); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .modal-close { position: absolute; top: 20px; right: 20px; font-size: 30px; color: #999; cursor: pointer; line-height: 1; }
        .modal-close:hover { color: var(--red); }
        .modal-title { font-size: 30px; font-weight: 900; margin-bottom: 20px; color: var(--blue); border-bottom: 2px solid var(--red); display: inline-block; padding-bottom: 10px; }
        .modal-text { font-size: 17px; line-height: 1.8; color: #444; }
        .modal-text strong { color: var(--red); font-weight: 800; }
        .modal-list { margin: 20px 0; padding-left: 20px; }
        .modal-list li { margin-bottom: 10px; font-size: 16px; }
        .modal-cta { margin-top: 30px; text-align: center; }

        /* Floating Buttons & WA Animation */
        .side-btn { position: fixed; bottom: 30px; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 2000; cursor: pointer; transition: 0.3s; box-shadow: 0 8px 25px rgba(0,0,0,0.2); }
        @keyframes pulse-green {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }
        .btn-wa { right: 30px; background: var(--wa); animation: pulse-green 2s infinite; }
        .btn-acc { left: 30px; background: var(--blue); border: 2px solid #fff; color: #fff; font-size: 28px; text-decoration: none; }
        .side-btn:hover { transform: translateY(-5px); }

        /* Accessibility Menu */
        #acc-menu {
            display: none; position: fixed; bottom: 105px; left: 30px;
            background: #fff; color: var(--blue); padding: 25px; border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.5); z-index: 2001; width: 250px;
        }
        #acc-menu button {
            width: 100%; padding: 12px; margin-bottom: 10px; border: 1px solid #eee;
            border-radius: 10px; cursor: pointer; font-family: 'Heebo';
            font-weight: 700; text-align: left; transition: 0.2s;
        }
        #acc-menu button:hover { background: #f0f2f5; border-color: var(--blue); }

        /* ===== TECH MARQUEE (infinite, CSS-only) ===== */
        .tech-marquee {
            background: #060912;
            padding: 30px 0;
            overflow: hidden;
            position: relative;
            border-top: 1px solid rgba(139,127,232,0.12);
            -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 12%, #000 88%, transparent 100%);
            mask-image: linear-gradient(90deg, transparent 0, #000 12%, #000 88%, transparent 100%);
        }
        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-scroll 22s linear infinite;
            will-change: transform;
        }
        @media (hover: hover) and (pointer: fine) { .tech-marquee:hover .marquee-track { animation-play-state: paused; } }
        .marquee-track .marquee-item {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            padding: 0 38px;
            font-size: 30px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #5b6b85;
            white-space: nowrap;
            transition: color 0.3s;
        }
        .marquee-track .marquee-item:hover { color: #fff; }
        .marquee-item img { height: 26px; width: auto; opacity: 0.85; }
        .marquee-item .sep { color: var(--auto); font-size: 18px; opacity: 0.9; }
        @keyframes marquee-scroll {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        .tech-marquee { direction: ltr; }
        @media (prefers-reduced-motion: reduce) {
            .marquee-track { animation: none; }
        }

        /* ===== LEAD MAGNET FUNNEL ===== */
        .magnet { background: radial-gradient(circle at 30% 20%, #16224d 0%, var(--dark) 78%); position: relative; overflow: hidden; }
        .magnet::after {
            content: "";
            position: absolute;
            bottom: -140px; left: -100px;
            width: 420px; height: 420px;
            background: radial-gradient(circle, var(--auto-glow) 0%, transparent 68%);
            opacity: 0.30; pointer-events: none; z-index: 0;
        }
        .magnet .sec-head { position: relative; z-index: 1; }
        .magnet .sec-head .eyebrow { color: var(--auto); border-color: rgba(139,127,232,0.45); background: rgba(139,127,232,0.06); }
        .magnet .sec-head .eyebrow::before { content: "\f02d"; font-family: "Font Awesome 6 Free"; font-weight: 900; margin-right: 9px; }
        .magnet-card {
            position: relative; z-index: 1;
            max-width: 1080px; margin: 0 auto;
            background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(139,127,232,0.06) 100%);
            border: 1px solid rgba(139,127,232,0.28);
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.40), 0 0 0 1px rgba(139,127,232,0.10);
            overflow: hidden;
        }
        .magnet-ribbon {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            background: linear-gradient(90deg, rgba(255,215,0,0.12), rgba(139,127,232,0.12));
            border-bottom: 1px solid rgba(139,127,232,0.20);
            padding: 14px 20px; text-align: center;
            color: var(--gold); font-weight: 800; font-size: 15px; letter-spacing: 0.5px;
        }
        .magnet-ribbon i { color: var(--gold); }
        .magnet-split { display: grid; grid-template-columns: 1fr auto 1fr; align-items: stretch; }
        .magnet-side { padding: 42px 40px; display: flex; flex-direction: column; }
        .magnet-side h3 { font-size: 24px; font-weight: 900; margin: 0 0 8px; color: #fff; display: flex; align-items: center; gap: 12px; }
        .magnet-side h3 i { color: var(--auto); font-size: 22px; }
        .magnet-side .side-sub { font-size: 16px; color: #c4ccde; margin: 0 0 22px; line-height: 1.6; }
        .magnet-or {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 0 6px; position: relative;
        }
        .magnet-or::before, .magnet-or::after {
            content: ""; width: 1px; flex: 1;
            background: linear-gradient(rgba(139,127,232,0), rgba(139,127,232,0.35), rgba(139,127,232,0));
        }
        .magnet-or span {
            width: 48px; height: 48px; border-radius: 50%;
            background: rgba(139,127,232,0.12); border: 1px solid rgba(139,127,232,0.4);
            display: flex; align-items: center; justify-content: center;
            font-weight: 900; font-size: 14px; color: var(--auto); letter-spacing: 1px;
            margin: 14px 0;
        }
        .magnet-form .form-group { margin-bottom: 14px; }
        .magnet-form input {
            width: 100%; padding: 14px 16px; border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.16);
            background: rgba(255,255,255,0.05); color: #fff;
            font-family: 'Heebo'; font-size: 16px; transition: 0.3s;
        }
        .magnet-form input::placeholder { color: #9aa4bd; }
        .magnet-form input:focus { border-color: var(--auto); outline: none; background: rgba(139,127,232,0.08); }
        .magnet-submit {
            width: 100%; padding: 16px; margin-top: 4px;
            background: var(--red); color: #fff; border: none; border-radius: 12px;
            font-family: 'Heebo'; font-weight: 800; font-size: 17px; cursor: pointer;
            transition: 0.3s; box-shadow: 0 6px 18px rgba(230,70,58,0.35);
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
        }
        .magnet-submit:hover { background: #c5352b; transform: translateY(-3px); }
        .magnet-privacy { font-size: 13px; color: #8a93ab; text-align: center; margin: 14px 0 0; }
        .magnet-qr-side { align-items: center; text-align: center; justify-content: center; }
        .magnet-qr-frame {
            background: #fff; border-radius: 18px; padding: 16px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.35); margin-bottom: 18px;
            border: 4px solid rgba(139,127,232,0.25);
        }
        .magnet-qr-frame img { width: 168px; height: 168px; display: block; }
        .magnet-qr-side .qr-caption { font-size: 17px; font-weight: 800; color: #fff; margin: 0 0 6px; }
        .magnet-qr-side .qr-hint { font-size: 14px; color: #aeb6cb; margin: 0 0 20px; }
        .magnet-qr-link {
            display: inline-flex; align-items: center; gap: 9px;
            color: var(--auto); font-weight: 800; font-size: 15px; text-decoration: none;
            border: 1px solid rgba(139,127,232,0.4); border-radius: 30px;
            padding: 11px 22px; transition: 0.3s;
        }
        .magnet-qr-link:hover { background: rgba(139,127,232,0.12); border-color: var(--auto); transform: translateY(-2px); }
        .magnet-qr-link i { font-size: 16px; }

        /* ===== INTERACTIVE LEAK DIAGNOSTIC ===== */
        .diag-card {
            position: relative; z-index: 1;
            max-width: 880px; margin: 0 auto;
            background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(139,127,232,0.07) 100%);
            border: 1px solid rgba(139,127,232,0.30);
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.40), 0 0 0 1px rgba(139,127,232,0.10);
            overflow: hidden;
        }
        .diag-ribbon {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            background: linear-gradient(90deg, rgba(255,215,0,0.12), rgba(139,127,232,0.12));
            border-bottom: 1px solid rgba(139,127,232,0.20);
            padding: 14px 20px; text-align: center;
            color: var(--gold); font-weight: 800; font-size: 15px; letter-spacing: 0.5px;
        }
        .diag-ribbon i { color: var(--gold); }
        .diag-body { padding: 40px 44px 46px; }

        /* progress */
        .diag-progress { display: flex; align-items: center; gap: 10px; margin-bottom: 28px; }
        .diag-progress .bar { flex: 1; height: 6px; border-radius: 6px; background: rgba(255,255,255,0.10); overflow: hidden; }
        .diag-progress .bar-fill { height: 100%; width: 0; border-radius: 6px; background: linear-gradient(90deg, var(--auto-deep), var(--auto)); transition: width 0.45s cubic-bezier(0.22,0.61,0.36,1); box-shadow: 0 0 14px var(--auto-glow); }
        .diag-progress .bar-label { font-size: 13px; font-weight: 800; color: var(--auto); letter-spacing: 1px; white-space: nowrap; }

        /* step transitions */
        .diag-step { display: none; animation: diagIn 0.45s cubic-bezier(0.22,0.61,0.36,1); }
        .diag-step.active { display: block; }
        @keyframes diagIn { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }

        .diag-q-num { font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: var(--auto); margin-bottom: 10px; }
        .diag-q-title { font-size: 27px; font-weight: 900; color: #fff; margin: 0 0 24px; line-height: 1.25; }
        .diag-options { display: grid; gap: 14px; }
        .diag-opt {
            display: flex; align-items: center; gap: 16px;
            width: 100%; text-align: left;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(139,127,232,0.22);
            border-radius: 16px; padding: 18px 20px;
            color: #e8ecf5; font-family: 'Heebo'; font-size: 17px; font-weight: 700;
            cursor: pointer; transition: 0.25s;
        }
        .diag-opt:hover { background: rgba(139,127,232,0.12); border-color: var(--auto); transform: translateY(-2px); }
        .diag-opt .opt-ico {
            flex-shrink: 0; width: 44px; height: 44px; border-radius: 12px;
            background: linear-gradient(135deg, var(--blue), var(--auto-deep));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 18px;
        }
        .diag-opt .opt-text { display: flex; flex-direction: column; gap: 3px; }
        .diag-opt .opt-text small { font-weight: 600; font-size: 13px; color: #aeb6cb; }

        .diag-back {
            background: none; border: none; color: #8a93ab; font-family: 'Heebo';
            font-weight: 700; font-size: 14px; cursor: pointer; margin-top: 22px;
            display: inline-flex; align-items: center; gap: 7px; transition: 0.2s;
        }
        .diag-back:hover { color: var(--auto); }

        /* calculating */
        .diag-calc { text-align: center; padding: 30px 0 10px; }
        .diag-calc .spinner {
            width: 56px; height: 56px; margin: 0 auto 22px;
            border: 4px solid rgba(139,127,232,0.2); border-top-color: var(--auto);
            border-radius: 50%; animation: diagSpin 0.8s linear infinite;
        }
        @keyframes diagSpin { to { transform: rotate(360deg); } }
        .diag-calc p { font-size: 18px; font-weight: 700; color: #c4ccde; margin: 0; }

        /* result */
        .diag-result-badge {
            display: inline-flex; align-items: center; gap: 9px;
            background: rgba(230,70,58,0.12); border: 1px solid rgba(230,70,58,0.4);
            color: #ff8a80; font-weight: 800; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;
            padding: 7px 16px; border-radius: 30px; margin-bottom: 18px;
        }
        .diag-result-badge i { color: var(--red); }
        .diag-result h3 { font-size: 30px; font-weight: 900; color: #fff; margin: 0 0 8px; line-height: 1.2; }
        .diag-result .leak-stage { color: var(--auto); }
        .diag-result .result-cost { font-size: 18px; color: #d7deee; line-height: 1.7; margin: 0 0 22px; }
        .diag-result .result-cost strong { color: var(--gold); }
        .diag-map {
            display: flex; flex-wrap: wrap; gap: 8px; margin: 0 0 28px;
            background: rgba(0,0,0,0.18); border: 1px solid rgba(139,127,232,0.16);
            border-radius: 14px; padding: 16px;
        }
        .diag-map .stage {
            flex: 1; min-width: 120px; text-align: center;
            font-size: 12px; font-weight: 800; color: #8a93ab;
            padding: 10px 8px; border-radius: 10px; transition: 0.3s; line-height: 1.4;
        }
        .diag-map .stage i { display: block; font-size: 16px; margin-bottom: 6px; opacity: 0.7; }
        .diag-map .stage.leaking {
            background: rgba(230,70,58,0.14); color: #ff8a80;
            box-shadow: 0 0 0 1px rgba(230,70,58,0.4);
        }
        .diag-map .stage.leaking i { opacity: 1; color: var(--red); }
        .diag-result-cta { display: flex; flex-wrap: wrap; gap: 14px; align-items: center; }
        .diag-restart {
            background: none; border: none; color: #8a93ab; font-family: 'Heebo';
            font-weight: 700; font-size: 14px; cursor: pointer; transition: 0.2s;
            display: inline-flex; align-items: center; gap: 7px;
        }
        .diag-restart:hover { color: var(--auto); }
        .diag-result-qr {
            margin-top: 24px; padding-top: 22px; border-top: 1px solid rgba(139,127,232,0.16);
            display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
            font-size: 14px; color: #aeb6cb;
        }
        .diag-result-qr a { color: var(--auto); font-weight: 800; text-decoration: none; }
        .diag-result-qr a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .diag-body { padding: 28px 22px 32px; }
            .diag-q-title { font-size: 22px; }
            .diag-result h3 { font-size: 24px; }
            .diag-map .stage { min-width: 30%; }
        }

        /* ===== ABOUT NIR ===== */
        .about-nir { background: linear-gradient(160deg, #0c1429 0%, var(--dark) 70%); position: relative; overflow: hidden; }
        .about-nir::after {
            content: "";
            position: absolute;
            top: -120px; left: -100px;
            width: 420px; height: 420px;
            background: radial-gradient(circle, var(--auto-glow) 0%, transparent 68%);
            opacity: 0.28; pointer-events: none; z-index: 0;
        }
        .about-wrap {
            position: relative; z-index: 1;
            max-width: 1120px; margin: 0 auto;
            display: grid; grid-template-columns: 0.85fr 1.15fr;
            gap: 56px; align-items: center;
        }
        .about-photo { position: relative; }
        .about-photo img {
            width: 100%; max-width: 360px; height: auto;
            display: block; margin: 0 auto;
            border-radius: 24px;
            object-fit: cover;
            box-shadow: 0 24px 60px rgba(0,0,0,0.45), 0 0 0 1px rgba(139,127,232,0.18);
            border: 1px solid rgba(139,127,232,0.25);
        }
        /* soft gold + violet frame accent behind the portrait */
        .about-photo::before {
            content: "";
            position: absolute;
            top: -14px; right: 6px; bottom: 14px; left: 6px;
            border-radius: 28px;
            background: linear-gradient(135deg, rgba(255,215,0,0.10), rgba(139,127,232,0.16));
            transform: rotate(-2.5deg);
            z-index: -1;
        }
        .about-copy .eyebrow { color: var(--auto); border-color: rgba(139,127,232,0.45); background: rgba(139,127,232,0.06); }
        .about-copy .eyebrow::before { content: "\f4fc"; font-family: "Font Awesome 6 Free"; font-weight: 900; margin-right: 9px; }
        .about-copy h2 { font-size: 40px; font-weight: 900; margin: 0 0 8px; line-height: 1.18; }
        .about-copy h2 span { color: var(--gold); }
        .about-copy .about-sub { font-size: 20px; font-weight: 800; color: var(--auto); margin: 0 0 22px; }
        .about-copy p { font-size: 17px; opacity: 0.92; margin: 0 0 16px; line-height: 1.75; color: #d7deee; }
        .about-copy .about-close {
            font-size: 19px; font-weight: 800; color: #fff; line-height: 1.5;
            margin: 26px 0 0; padding: 20px 24px;
            background: rgba(139,127,232,0.08);
            border: 1px solid rgba(139,127,232,0.30);
            border-left: 4px solid var(--gold);
            border-radius: 14px;
        }
        @media (max-width: 980px) {
            .about-wrap { grid-template-columns: 1fr; gap: 36px; }
            .about-photo img { max-width: 300px; }
        }
        @media (max-width: 768px) {
            .about-copy h2 { font-size: 30px; }
            .about-copy .about-sub { font-size: 18px; }
            .about-copy .about-close { font-size: 17px; padding: 18px 20px; }
        }

        footer { text-align: center; padding: 60px 20px; background: var(--dark); font-size: 14px; color: #888; border-top: 1px solid rgba(255,255,255,0.05); }
        footer a { color: var(--red); text-decoration: none; font-weight: 700; }
        .footer-links { margin: 16px 0; display: flex; flex-wrap: wrap; gap: 10px 24px; justify-content: center; }
        .footer-links a { color: #cfd6e6; }
        .footer-links a:hover { color: var(--red); }

        /* ===== Responsive ===== */
        @media (max-width: 980px) {
            .flagship-content { grid-template-columns: 1fr; }
            .contact-wrap { grid-template-columns: 1fr; gap: 40px; }
        }
        @media (max-width: 768px) {
            header { height: 85px; padding: 0 20px; }
            header img.logo { height: 56px; }
            .nav-area { display: none; }
            .hero { padding: 105px 18px 48px; text-align: center; }
            /* Banner shrinks to fit the phone, stays whole; copy + CTAs stack centered beneath it */
            .hero-banner { width: 100%; }
            .hero-copy { margin-top: 28px; }
            .hero-title { font-size: 34px; }
            .hero-sub { font-size: 17px; }
            .hero-divider { margin: 20px auto 18px; }
            .hero-cta-row { justify-content: center; margin-top: 28px; }
            .hero-inner { margin: 0 auto; }
            section { padding: 64px 22px; }
            .sec-head h2 { font-size: 34px; }
            .value h2 { font-size: 30px; }
            .flagship-content { padding: 28px 24px 34px; gap: 24px; }
            .pillar.flagship h3 { font-size: 26px; }
            .flagship-media { height: 190px; }
            .pillar.flagship .flagship-content .pillar-icon { margin-top: -58px; }
            .pillar-media { height: 150px; }
            .flagship-badge { display: inline-block; margin-bottom: 14px; }
            .cta-banner h2 { font-size: 30px; }
            .contact-copy h2 { font-size: 32px; }
            .contact-box { padding: 28px; }
            .t-card { margin-top: 60px; }
            .modal-content { padding: 25px; }
            .trust-strip { padding: 24px 18px; }
            .trust-inner { gap: 16px 26px; }
            .trust-logos { gap: 14px 24px; }
            .tech-logo img { height: 22px; }
            .tech-logo .tech-name { font-size: 14px; }
            .tech-badge { font-size: 13px; padding: 5px 11px; }
            .tech-marquee { padding: 22px 0; }
            .marquee-track { animation-duration: 13s; }
            .marquee-track .marquee-item { font-size: 22px; padding: 0 24px; gap: 10px; }
            .marquee-item img { height: 20px; }
            .magnet-split { grid-template-columns: 1fr; }
            .magnet-side { padding: 30px 24px; }
            .magnet-or { flex-direction: row; padding: 4px 24px; }
            .magnet-or::before, .magnet-or::after { width: auto; height: 1px; flex: 1; background: linear-gradient(90deg, rgba(139,127,232,0), rgba(139,127,232,0.35), rgba(139,127,232,0)); }
            .magnet-or span { margin: 0 14px; width: 42px; height: 42px; }
            .magnet-qr-frame img { width: 150px; height: 150px; }
        }
    </style>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXRL4W23"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <header>
        <img class="logo" src="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png" alt="Niro Digital Logo">
        <div class="nav-area">
            <div class="nav-menu">
                <a href="#home" class="nav-link">Home</a>

                <div class="dropdown">
                    <a href="#pillars" class="nav-link">What We Build</a>
                    <div class="dropdown-content">
                        <a href="javascript:void(0)" onclick="openModal('modal-agents')">AI Agents for Business</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-make')">Make Automations</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-manychat')">ManyChat Chatbots</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-crm')">CRM Systems (Airtable)</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-aibot')">AI Chatbots</a>
                    </div>
                </div>

                <a href="#how" class="nav-link">How It Works</a>

                <div class="dropdown">
                    <a href="#addons" class="nav-link">Marketing</a>
                    <div class="dropdown-content">
                        <a href="javascript:void(0)" onclick="openModal('modal-social')">Social Media</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-google')">Google Ads & SEO</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-web')">Landing Pages</a>
                    </div>
                </div>

                <a href="#testimonials" class="nav-link">Results</a>
                <a href="#faq-section" class="nav-link">FAQ</a>

                <a href="/" class="nav-link lang-btn" title="Hebrew"><i class="fas fa-globe"></i> HE</a>
                <a href="#contact" class="nav-link nav-cta">Free Audit</a>
            </div>
            <div class="header-social">
                <a href="https://www.facebook.com/profile.php?id=61578880211111" target="_blank" rel="noopener noreferrer" class="hs-fb"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/nvb.1982/" target="_blank" rel="noopener noreferrer" class="hs-ig"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </header>

    <!-- ============ HERO ============ -->
    <!-- Niro's branded hero banner (niro-hero-banner.png) sits full-width on top; the English headline copy returns beneath it (not instead of it); then the CTAs - all centered. -->
    <section class="hero reveal" id="home">
        <div class="hero-inner">
            <!-- Brand banner first, shown whole (contain) so nothing gets cropped. -->
            <img class="hero-banner" src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/niro-hero-banner-en.png" alt="NIRO.DIGITAL - Automation Solutions">
            <!-- English hero copy, beneath the banner. -->
            <div class="hero-copy">
                <span class="eyebrow">Automation Studio for Growing Businesses</span>
                <h1 class="hero-title">Build a Business That <span class="hl">Outworks Its Size</span></h1>
                <span class="hero-divider"></span>
                <p class="hero-sub">NIRO gives growing businesses a digital team of automations and AI agents that work around the clock - so you produce like a company twice your size, without doubling your costs.</p>
            </div>
            <div class="hero-cta-row">
                <a href="#contact" class="btn-primary"><i class="fas fa-wand-magic-sparkles"></i> Get a Free Automation Audit</a>
                <a href="https://wa.me/972537142298" target="_blank" rel="noopener noreferrer" class="btn-wa-text"><i class="fab fa-whatsapp"></i> Talk to us on WhatsApp</a>
            </div>
        </div>
    </section>

    <!-- ============ TRUST / TECH-STACK STRIP ============ -->
    <!-- Logos via cdn.simpleicons.org (white variant for the dark strip). Verified slugs: make, airtable, anthropic. ManyChat has no slug -> styled text badge fallback. -->
    <div class="trust-strip">
        <div class="trust-inner">
            <span class="trust-label">Our automation stack</span>
            <div class="trust-logos">
                <span class="tech-logo"><img src="https://cdn.simpleicons.org/make/ffffff" alt="Make" loading="lazy"><span class="tech-name">Make</span></span>
                <span class="tech-badge"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAYFBMVEX///8AAACKioqvr68WFhaysrLz8/M1NTVycnKNjY34+PhXV1f7+/vl5eUQEBDZ2dnExMSUlJQmJiZDQ0OoqKg7OzttbW28vLzOzs6dnZ18fHyCgoIwMDBfX19RUVEeHh43HcgSAAADI0lEQVR4nO2a22KCMAyGLeBxnBFBJ/j+b7m5KURIE2wp20X+S4jtRw9Jk7paiUQikUgkEolEIpHIpcLEzzwv86O/6HyTZFvVyUvChbtPd+pFcbZZsv9q0P1dl+UmIvTycf9KnZYag+QD6/6+EJZZB9VN079SPvvjev2+/OSlibW+f9Wwy+BT/2O9vANowY8p04oD8EwA9gAgpU1bbh3aAqRbxpabA0uApOBsL04BNoj7GcopwHmCMTMHVgA1sQE7MfvABiDkFuCPmEVgAzDNh7TOABLSA3Uq6XhgDnDQRaCBrvQqNAdYB9OM89oNQNRMNA7WbgCOU43joxOAiPXBnc5OACYPgFKZEwDEBzXn4wU7GnoOAMLxKSA4f2+3w34hgFU5fPRYahUyBA4AsvEAPE6f2PnAACBvP55qMX+bnYZPnhFnJoBdtHkqwiLe6Tp4UDxPfvVMAP1JcoMB5MNhSZ/m6RDNDcBQ+y7gYQHCwA+8CQDCDeafDDzhmwD9J4aIH4idA5T9AGAhMqDzwxkAPvvWasQPOQfIQapaIe9v9LHYHuDUN3bAWjM5Eb0FAAYgQryAuiZItzMClKCxBDPY0vmxNUAKGkMThXLc6ZwAN/h9aKZWuAXIQNoRoRYmmdEbAHCF4bl64xRgB2cArRVCP+UAAJ75KzxXpEOBJUAJncwFt0nHnc4HsAPlsqjFbWg/ZAfwEmmPmmydqdZaAZQg89bWq+j+7QBAHFrVo1RhAQC4B3QFM8YR2gEAJ6BbgpwfsgKAYUZbMqbPxHYAcAa0JVO6PmIHAPYAHofuYtyADUABdjiWlv/KqFw/DQDMbojHoW/FDgGY0/CvCncA0A3qa5aNOwBwcYTVRR7acxd35gBgfxFVa7pIaAOw7Y8C1L0NnZXYAIAbQerexB1AvwmpoumN80PGACDnpW4OW/bm1BSg6D7toIuDd/FXt6YATbe9yKvTl0veWQH6qyiybM7uQmOAzgugGfHYTKt9HIykLgCgRAyCOO/mdqeQ950Ze3m+SnxEde8/wzVm4Pdfhr9/qPqTv/OIRCKRSCQSiUQikUj03/UF6usxFLYj2e4AAAAASUVORK5CYII=" alt="" style="filter: invert(1); height: 20px; width: auto; vertical-align: middle;"> ManyChat</span>
                <span class="tech-logo"><img src="https://cdn.simpleicons.org/airtable/ffffff" alt="Airtable" loading="lazy"><span class="tech-name">Airtable</span></span>
                <span class="tech-logo"><img src="https://cdn.simpleicons.org/anthropic/ffffff" alt="Claude by Anthropic" loading="lazy"><span class="tech-name">Claude</span></span>
                <span class="tech-logo"><img src="https://cdn.simpleicons.org/whatsapp/25D366" alt="WhatsApp" loading="lazy"><span class="tech-name">WhatsApp</span></span>
            </div>
        </div>
    </div>

    <!-- ============ ABOUT NIR ============ -->
    <section class="about-nir reveal" id="about">
        <div class="about-wrap">
            <div class="about-photo">
                <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/nir-portrait.jpg" alt="Nir - founder of NIRO Digital" loading="lazy">
            </div>
            <div class="about-copy">
                <span class="eyebrow">Meet the person behind the systems</span>
                <h2>Nice to meet you &mdash; <span>I'm Nir</span></h2>
                <p class="about-sub">Your automation &amp; marketing partner.</p>
                <p>Real marketing and real automation start with something human. Before the numbers, the algorithms, and the systems, there are people: the story, the vision, and the heart behind your business. That's where I begin.</p>
                <p>I bring together creative thinking, a personal strategy built for each client, and smart AI &amp; automation tools, without ever losing the human side and the personal connection. The technology does the heavy lifting; the relationship stays real.</p>
                <p>I don't believe in marketing that burns your budget on "exposure." I believe in results you can feel: more clients, more revenue, and systems that quietly keep working for you, even when you're off the clock.</p>
                <p class="about-close">My goal is simple: that you won't be just another business trying to stand out &mdash; but a leading business that runs on systems, and reaps the profits.</p>
            </div>
        </div>
    </section>

    <!-- ============ VALUE / FRAMING ============ -->
    <section class="value reveal">
        <div class="value-wrap">
            <h2>Most businesses don't grow slower because they <span>lack effort</span></h2>
            <p>They grow slower because too much still depends on a human doing it by hand. Answering the same questions. Copying leads between apps. Chasing follow-ups that get forgotten.</p>
            <p>We connect your tools, automate the busywork, and turn your day-to-day into systems that work whether you're online or not. So your time goes to growth, not maintenance.</p>
        </div>
    </section>

    <!-- ============ PILLARS ============ -->
    <section class="pillars reveal" id="pillars">
        <div class="sec-head">
            <span class="eyebrow">What We Build</span>
            <h2>A digital team that gets the work done</h2>
            <p>Five systems that capture every lead, answer around the clock, and take the repetitive work off your plate.</p>
        </div>
        <div class="pillar-grid">

            <!-- FLAGSHIP: AI Agents -->
            <div class="pillar flagship" onclick="openModal('modal-agents')">
                <span class="flagship-badge">New Edge</span>
                <div class="flagship-media">
                    <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/2026-06-18-pillar-ai-agents.png" alt="AI agents for business - a digital team that never sleeps" loading="lazy">
                </div>
                <div class="flagship-content">
                <div>
                    <div class="pillar-icon"><i class="fas fa-people-group"></i></div>
                    <h3>AI Agents for Business</h3>
                    <span class="pillar-tagline">Not just a bot that answers - a team of AI specialists that gets work done</span>
                    <p>Imagine a digital team that never sleeps: one AI agent handles your content, another your social, another your follow-ups and CRM. Each one a specialist. Each one actually doing the work, not just talking about it. This is how you outwork your size - a force multiplier for a business that wants to grow without growing its payroll.</p>
                    <span class="read-more-btn">See how the AI agent team works &raquo;</span>
                </div>
                <div class="flagship-right">
                    <div class="agent-chip clickable" role="button" tabindex="0" onclick="event.stopPropagation(); openModal('modal-agent-content')" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();event.stopPropagation();openModal('modal-agent-content');}"><i class="fas fa-pen-nib"></i> <span class="chip-label">Content agent - drafts ready for your approval</span> <span class="chip-more"><span>Learn more</span> <i class="fas fa-arrow-right"></i></span></div>
                    <div class="agent-chip clickable" role="button" tabindex="0" onclick="event.stopPropagation(); openModal('modal-agent-social')" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();event.stopPropagation();openModal('modal-agent-social');}"><i class="fas fa-hashtag"></i> <span class="chip-label">Social agent - plans and prepares your posts</span> <span class="chip-more"><span>Learn more</span> <i class="fas fa-arrow-right"></i></span></div>
                    <div class="agent-chip clickable" role="button" tabindex="0" onclick="event.stopPropagation(); openModal('modal-agent-followup')" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();event.stopPropagation();openModal('modal-agent-followup');}"><i class="fas fa-clock-rotate-left"></i> <span class="chip-label">Follow-up agent - never lets a lead go cold</span> <span class="chip-more"><span>Learn more</span> <i class="fas fa-arrow-right"></i></span></div>
                    <div class="agent-chip clickable" role="button" tabindex="0" onclick="event.stopPropagation(); openModal('modal-agent-reporting')" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();event.stopPropagation();openModal('modal-agent-reporting');}"><i class="fas fa-chart-line"></i> <span class="chip-label">Reporting agent - your numbers, every week</span> <span class="chip-more"><span>Learn more</span> <i class="fas fa-arrow-right"></i></span></div>
                </div>
                </div>
            </div>

            <!-- Make -->
            <div class="pillar" onclick="openModal('modal-make')">
                <div class="pillar-media">
                    <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/2026-06-18-pillar-make.png" alt="Make automations - your tools connected into one workflow" loading="lazy">
                </div>
                <div class="pillar-body">
                    <div class="pillar-icon"><i class="fas fa-bolt"></i></div>
                    <h3>Make Automations</h3>
                    <span class="pillar-tagline">Connect your tools so the work happens by itself</span>
                    <p>Your apps stop living on separate islands. New leads, orders, and updates flow automatically from one system to the next. No copy-paste, no things slipping through the cracks.</p>
                    <span class="read-more-btn">What's included &raquo;</span>
                </div>
            </div>

            <!-- ManyChat -->
            <div class="pillar" onclick="openModal('modal-manychat')">
                <div class="pillar-media">
                    <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/2026-06-18-pillar-manychat.png" alt="ManyChat chatbots - automatic conversations on Messenger, Instagram and WhatsApp" loading="lazy">
                </div>
                <div class="pillar-body">
                    <div class="pillar-icon"><i class="fas fa-comments"></i></div>
                    <h3>ManyChat Chatbots</h3>
                    <span class="pillar-tagline">Automatic conversations on Messenger, Instagram & WhatsApp</span>
                    <p>Reply to every comment, DM, and message instantly. Qualify the serious leads, answer the routine questions, and book meetings - without you watching your phone all day.</p>
                    <span class="read-more-btn">What's included &raquo;</span>
                </div>
            </div>

            <!-- Airtable CRM -->
            <div class="pillar" onclick="openModal('modal-crm')">
                <div class="pillar-media">
                    <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/2026-06-18-pillar-crm.png" alt="CRM systems on Airtable - one organized home for every lead" loading="lazy">
                </div>
                <div class="pillar-body">
                    <div class="pillar-icon"><i class="fas fa-table-cells-large"></i></div>
                    <h3>CRM Systems (Airtable)</h3>
                    <span class="pillar-tagline">One organized home for every lead and customer</span>
                    <p>Stop losing track of who to follow up with. Every lead lands in one tidy system, tagged by source, with its status always up to date. Nobody slips away, nothing gets forgotten.</p>
                    <span class="read-more-btn">What's included &raquo;</span>
                </div>
            </div>

            <!-- AI Chatbots -->
            <div class="pillar" onclick="openModal('modal-aibot')">
                <div class="pillar-media">
                    <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/06/2026-06-18-pillar-ai-chatbots.png" alt="AI chatbots - smart answers, sales and support around the clock" loading="lazy">
                </div>
                <div class="pillar-body">
                    <div class="pillar-icon"><i class="fas fa-robot"></i></div>
                    <h3>AI Chatbots</h3>
                    <span class="pillar-tagline">Smart answers, sales, and support - 24/7</span>
                    <p>An AI assistant on your website or WhatsApp that understands real questions, answers them in your tone, and guides people toward booking, buying, or leaving their details. Even at 2 a.m.</p>
                    <span class="read-more-btn">What's included &raquo;</span>
                </div>
            </div>

        </div>
    </section>

    <!-- ============ MID-PAGE CTA BANNER ============ -->
    <section class="cta-banner reveal">
        <h2>See what we'd automate first</h2>
        <p>The free audit maps how leads and work flow through your business today, and pinpoints exactly where time, money, and leads are leaking. You walk away knowing your biggest opportunity - whether you work with us or not.</p>
        <a href="#contact" class="btn-primary"><i class="fas fa-magnifying-glass-chart"></i> Get my free automation audit</a>
        <p class="micro">The leaders in your market already run on systems like these. The audit shows you where to start.</p>
    </section>

    <!-- ============ HOW IT WORKS ============ -->
    <section class="how reveal" id="how">
        <div class="sec-head">
            <span class="eyebrow">How It Works</span>
            <h2>From audit to autopilot in four steps</h2>
            <p>A real method, not a black box. You approve before anything gets built.</p>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-num">1</div>
                <h3>Free Automation Audit</h3>
                <p>We map how leads and work flow through your business today, and pinpoint exactly where time, money, and leads are leaking. You walk away knowing your biggest opportunity.</p>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <h3>The Blueprint</h3>
                <p>We design your automation system on paper first: what connects to what, what happens automatically, and what it saves you. You approve it before a single thing is built.</p>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <h3>We Build It</h3>
                <p>We build and connect everything - the workflows, the chatbots, the CRM, the agents - and test it end-to-end with real scenarios, so it works on day one.</p>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <h3>Live & Supported</h3>
                <p>Your system goes live and starts working for you. We monitor it, fix issues before they reach your customers, and refine it as your business grows.</p>
            </div>
        </div>
    </section>

    <!-- ============ PROOF / TRUST BLOCK ============ -->
    <section class="proof reveal">
        <div class="sec-head">
            <span class="eyebrow">Why NIRO</span>
            <h2>Built right, explained plainly, supported for the long run</h2>
            <p>No black boxes, no fake numbers. Just a real method and platforms trusted worldwide.</p>
        </div>
        <div class="proof-grid">
            <div class="proof-card">
                <i class="fas fa-cubes"></i>
                <h3>Built on the tools the pros use</h3>
                <p>Powered by Make, ManyChat, Airtable and modern AI - proven platforms trusted by thousands of businesses worldwide.</p>
            </div>
            <div class="proof-card">
                <i class="fas fa-circle-check"></i>
                <h3>You approve before we build</h3>
                <p>Every system is mapped and approved by you first. No black boxes, no surprise bills.</p>
            </div>
            <div class="proof-card">
                <i class="fas fa-comment-dots"></i>
                <h3>Plain language, no jargon</h3>
                <p>We explain every automation in human terms, and hand you a system you actually understand and control.</p>
            </div>
            <div class="proof-card">
                <i class="fas fa-vial-circle-check"></i>
                <h3>Tested before it's trusted</h3>
                <p>Every automation is tested end-to-end with real scenarios before it ever goes live for your customers.</p>
            </div>
            <div class="proof-card">
                <i class="fas fa-headset"></i>
                <h3>We don't disappear after launch</h3>
                <p>Ongoing monitoring and support, because an automation that breaks silently is worse than no automation at all.</p>
            </div>
            <div class="proof-card">
                <i class="fas fa-user-shield"></i>
                <h3>A human stays in control</h3>
                <p>Agents and automations do the work, but the actions that matter - publishing, spending, anything live - wait for your "go."</p>
            </div>
        </div>
    </section>

    <!-- ============ TESTIMONIALS ============ -->
    <section class="testimonials reveal" id="testimonials">
        <h2 style="font-size:48px; margin-bottom:10px; font-weight:900;">What do the clients say?</h2>
        <p style="opacity:0.8; font-size:19px; max-width:700px; margin:0 auto;">Real businesses, running on systems we built.</p>
        <div class="t-grid">
            <div class="t-card">
                <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/לוגו-עסק.jpg" class="t-logo">
                <div class="t-stars">⭐⭐⭐⭐⭐</div>
                <span class="t-name">Tal Holistic</span>
                <span class="t-role">A true success story</span>
                <p>"Working with Nir changed my business. The automation system NIRO built for me makes the leads sort themselves out, and it's simply like magic."</p>
            </div>
            <div class="t-card">
                <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/אביגדור-עסק-SS-SOLAR.jpg" class="t-logo">
                <div class="t-stars">⭐⭐⭐⭐⭐</div>
                <span class="t-name">S.S Solar LTD</span>
                <span class="t-role">Green energy and growth</span>
                <p>"We reached a point where we choose which clients to work with. The precision in marketing and the understanding of the market are simply amazing!"</p>
            </div>
            <div class="t-card">
                <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/MY-TROPICAL-ניקול.jpg" class="t-logo">
                <div class="t-stars">⭐⭐⭐⭐⭐</div>
                <span class="t-name">Nicole - My tropical house</span>
                <span class="t-role">Bridal preparation house</span>
                <p>"Nir's service feels personal, not 'just another client'. He built me a plan that doubled the revenues within three months."</p>
            </div>
            <div class="t-card">
                <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/life-stayle-logo-scaled.jpg" class="t-logo">
                <div class="t-stars">⭐⭐⭐⭐⭐</div>
                <span class="t-name">Daniela - Online Store</span>
                <span class="t-role">Lifestyle products</span>
                <p>"With Nir, I felt I had a real partner for growth. He didn't just market my business - he built a warm and loyal community around it. Highly recommended."</p>
            </div>
        </div>
    </section>

    <!-- ============ MARKETING ADD-ONS (secondary) ============ -->
    <section class="addons reveal" id="addons">
        <div class="sec-head">
            <span class="eyebrow">Also available</span>
            <h2>Marketing that feeds the machine</h2>
            <p>Automation captures and nurtures the leads. When you want more of them coming in, these bring the traffic.</p>
        </div>
        <div class="addon-grid">
            <div class="addon" onclick="openModal('modal-social')">
                <i class="fab fa-instagram"></i>
                <h3>Social Media Management</h3>
                <p>Strategy and content that build a brand people trust - and remember when they're ready to buy.</p>
                <span class="read-more-btn">Learn more &raquo;</span>
            </div>
            <div class="addon" onclick="openModal('modal-google')">
                <i class="fab fa-google"></i>
                <h3>Google Ads & SEO</h3>
                <p>Be there at the moment of truth - when your customer is actively searching for a solution.</p>
                <span class="read-more-btn">Learn more &raquo;</span>
            </div>
            <div class="addon" onclick="openModal('modal-web')">
                <i class="fas fa-window-maximize"></i>
                <h3>Landing Pages & Websites</h3>
                <p>A designed digital asset built to convert - and to plug straight into your automation.</p>
                <span class="read-more-btn">Learn more &raquo;</span>
            </div>
        </div>
    </section>

    <!-- ============ FAQ ============ -->
    <section class="faq-section reveal" id="faq-section">
        <div class="faq-container">
            <h2 style="text-align:center; margin-bottom:50px; font-size:42px; font-weight:900;">Important Questions</h2>

            <div class="faq-item">
                <div class="faq-question">What exactly is the free automation audit? <span>+</span></div>
                <div class="faq-answer">It's a no-obligation map of how leads and work flow through your business today, and where time, money, and leads are leaking. You walk away knowing your single biggest opportunity - whether you work with us or not. It gives before it asks.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Are "AI agents" the same as a chatbot? <span>+</span></div>
                <div class="faq-answer">No. A chatbot answers questions. An AI agent does work - it drafts content, updates your CRM, sorts and routes leads, and prepares tasks for your approval, connected to the tools you already use. Think of it as a specialist team member, not a help desk. And a human always stays in control of anything that goes live.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Will this work with the tools I already use? <span>+</span></div>
                <div class="faq-answer">In most cases, yes. Make connects hundreds of apps - forms, ads, email, spreadsheets, payments, calendars, CRMs - plus anything with an API. If a tool you use can't connect, we tell you up front in the audit instead of promising the impossible.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Do I need to be technical to manage this? <span>+</span></div>
                <div class="faq-answer">Not at all. We explain everything in plain language, build it around how you already work, and hand you a system you understand. You manage the business - the systems handle the repetitive work in the background.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">How do we start? <span>+</span></div>
                <div class="faq-answer">With the free audit. We map your business, design a blueprint you approve, build and test it end-to-end, then take it live with ongoing support. You approve before anything is built - no surprises, no wasted spend.</div>
            </div>
        </div>
    </section>

    <!-- ============ INTERACTIVE LEAK DIAGNOSTIC ============ -->
    <!-- Give-Value-First profiling experience built on NIRO's 6-station funnel model. -->
    <!-- The visitor clicks through 4 questions; JS maps the answers to the leaking station and shows a personalized result. -->
    <!-- The final CTA scrolls to the EXISTING main form (#contact) - NO new/duplicate form on the page. QR -> Fillout as an alternative. -->
    <section class="magnet reveal" id="lead-magnet">
        <div class="sec-head">
            <span class="eyebrow">30-second diagnostic</span>
            <h2>Find your biggest leak</h2>
            <p>Most businesses lose customers somewhere between the first message and the close - and never see where. Answer 4 quick questions and find out exactly where yours is leaking.</p>
        </div>

        <div class="diag-card">
            <div class="diag-ribbon">
                <i class="fas fa-magnifying-glass-chart"></i> Free instant diagnostic - no email, no signup, just answers
            </div>
            <div class="diag-body">

                <!-- progress bar -->
                <div class="diag-progress">
                    <div class="bar"><div class="bar-fill" id="diagBarFill"></div></div>
                    <span class="bar-label" id="diagBarLabel">Question 1 of 4</span>
                </div>

                <!-- STEP 1 -->
                <div class="diag-step active" data-step="0">
                    <div class="diag-q-num">Question 1</div>
                    <h3 class="diag-q-title">When a new lead messages you, how fast do they actually get a reply?</h3>
                    <div class="diag-options">
                        <button type="button" class="diag-opt" onclick="diagAnswer(0,'fast')"><span class="opt-ico"><i class="fas fa-bolt"></i></span><span class="opt-text">Within a few minutes, every time <small>Automated or always-on</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(0,'hours')"><span class="opt-ico"><i class="fas fa-hourglass-half"></i></span><span class="opt-text">Usually within a few hours <small>When I get to my phone</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(0,'slow')"><span class="opt-ico"><i class="fas fa-bed"></i></span><span class="opt-text">Sometimes the next day - or I forget <small>It depends how busy I am</small></span></button>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="diag-step" data-step="1">
                    <div class="diag-q-num">Question 2</div>
                    <h3 class="diag-q-title">Where do your leads actually live right now?</h3>
                    <div class="diag-options">
                        <button type="button" class="diag-opt" onclick="diagAnswer(1,'crm')"><span class="opt-ico"><i class="fas fa-table-cells-large"></i></span><span class="opt-text">One organized system / CRM <small>Everything in one place</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(1,'spread')"><span class="opt-ico"><i class="fas fa-file-lines"></i></span><span class="opt-text">A spreadsheet I update by hand <small>More or less under control</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(1,'scattered')"><span class="opt-ico"><i class="fas fa-shuffle"></i></span><span class="opt-text">Scattered - inbox, WhatsApp, DMs, my head <small>Wherever they came in</small></span></button>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="diag-step" data-step="2">
                    <div class="diag-q-num">Question 3</div>
                    <h3 class="diag-q-title">How does follow-up happen with a lead who didn't reply?</h3>
                    <div class="diag-options">
                        <button type="button" class="diag-opt" onclick="diagAnswer(2,'auto')"><span class="opt-ico"><i class="fas fa-robot"></i></span><span class="opt-text">Automatic reminders go out on their own <small>A system chases them</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(2,'manual')"><span class="opt-ico"><i class="fas fa-hand"></i></span><span class="opt-text">I follow up manually when I remember <small>If it crosses my mind</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(2,'never')"><span class="opt-ico"><i class="fas fa-ghost"></i></span><span class="opt-text">Honestly? They mostly go cold <small>No real follow-up</small></span></button>
                    </div>
                </div>

                <!-- STEP 4 -->
                <div class="diag-step" data-step="3">
                    <div class="diag-q-num">Question 4</div>
                    <h3 class="diag-q-title">Who answers customers after hours - nights and weekends?</h3>
                    <div class="diag-options">
                        <button type="button" class="diag-opt" onclick="diagAnswer(3,'bot')"><span class="opt-ico"><i class="fas fa-comments"></i></span><span class="opt-text">A chatbot / assistant handles it <small>Covered around the clock</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(3,'me')"><span class="opt-ico"><i class="fas fa-mobile-alt"></i></span><span class="opt-text">Me, on my own phone, whenever <small>I'm always kind of on</small></span></button>
                        <button type="button" class="diag-opt" onclick="diagAnswer(3,'noone')"><span class="opt-ico"><i class="fas fa-moon"></i></span><span class="opt-text">Nobody - they wait till morning <small>And some don't wait</small></span></button>
                    </div>
                </div>

                <!-- CALCULATING -->
                <div class="diag-step" data-step="calc">
                    <div class="diag-calc">
                        <div class="spinner"></div>
                        <p>Mapping your funnel and finding the leak...</p>
                    </div>
                </div>

                <!-- RESULT -->
                <div class="diag-step" data-step="result">
                    <div class="diag-result">
                        <span class="diag-result-badge"><i class="fas fa-triangle-exclamation"></i> Your biggest leak</span>
                        <h3>Your funnel is leaking at: <span class="leak-stage" id="diagLeakName">-</span></h3>
                        <p class="result-cost" id="diagLeakCost"></p>

                        <!-- 6-station mini map, leaking station highlighted -->
                        <div class="diag-map" id="diagMap">
                            <div class="stage" data-stage="enquiry"><i class="fas fa-inbox"></i>Enquiry comes in</div>
                            <div class="stage" data-stage="destination"><i class="fas fa-location-dot"></i>One clear place</div>
                            <div class="stage" data-stage="response"><i class="fas fa-bolt"></i>Instant response</div>
                            <div class="stage" data-stage="capture"><i class="fas fa-table-cells-large"></i>Auto-capture</div>
                            <div class="stage" data-stage="followup"><i class="fas fa-clock-rotate-left"></i>Smart follow-up</div>
                            <div class="stage" data-stage="close"><i class="fas fa-handshake"></i>You close</div>
                        </div>

                        <p class="result-cost" id="diagLeakFix"></p>

                        <div class="diag-result-cta">
                            <a href="#contact" class="btn-primary" onclick="diagGoToContact(event)"><i class="fas fa-wand-magic-sparkles"></i> <span id="diagCtaText">Get the fix - free audit</span></a>
                            <button type="button" class="diag-restart" onclick="diagRestart()"><i class="fas fa-rotate-left"></i> Start over</button>
                        </div>

                        <div class="diag-result-qr">
                            <i class="fas fa-qrcode" style="font-size:20px;color:var(--auto);"></i>
                            <span>Prefer your phone? <a href="https://rquam9hney.zite.so" target="_blank" rel="noopener noreferrer">Open the quick form &raquo;</a> and I'll map it with you.</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============ CLOSING CTA / CONTACT ============ -->
    <section class="contact reveal" id="contact">
        <div class="contact-wrap">
            <div class="contact-copy">
                <span class="eyebrow">Your free audit</span>
                <h2>Ready to stop being the bottleneck?</h2>
                <p class="closing-line">The winners aren't working harder. They're working with leverage. Let's build yours.</p>
                <p>Leave your details and I'll personally map where your business is leaking time and leads - and show you the first system worth building.</p>
                <ul>
                    <li><i class="fas fa-check-circle"></i> A real map of your biggest opportunity, free</li>
                    <li><i class="fas fa-check-circle"></i> No jargon, no obligation, no pressure</li>
                    <li><i class="fas fa-check-circle"></i> You approve before anything gets built</li>
                </ul>
            </div>

            <div class="contact-box">
                <h3>Get Your Free Automation Audit</h3>
                <p class="form-sub">Tell me about your business - I'll point you to the first win.</p>
                <form onsubmit="return handleFormSubmit(event)">
                    <div class="form-group"><input type="text" name="client_name" placeholder="Full Name" required></div>
                    <div class="form-group"><input type="tel" name="client_phone" placeholder="Phone Number" required></div>
                    <div class="form-group"><input type="email" name="client_email" placeholder="Email Address" required></div>
                    <div class="form-group"><textarea name="client_message" rows="3" placeholder="What's the most repetitive part of your day?"></textarea></div>
                    <button type="submit" class="submit-btn">Get My Free Audit</button>
                </form>
                <p class="wa-fallback">Prefer to chat first? <a href="https://wa.me/972537142298" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i> WhatsApp us</a> - just say "Automation".</p>
            </div>
        </div>
    </section>

    <!-- ============ MODALS ============ -->

    <!-- AI Agents (flagship) -->
    <div id="modal-agents" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-agents')">&times;</span><div class="modal-title">AI Agents for Business - your new edge</div><div class="modal-text"><p>Not just a bot that answers - a team of AI specialists that gets work done. This is how you outwork your size: a force multiplier for a business that wants to grow without growing its payroll.</p><p><strong>What's included:</strong></p><ul class="modal-list"><li>A <strong>custom team of AI agents</strong> built around your business - each specialized for one job (content, social, lead follow-up, reporting, internal operations).</li><li>Agents that <strong>take real action</strong>, not just answer: they create drafts, update your CRM, sort and route leads, trigger workflows, and prepare work for your approval - connected directly to the tools you already use.</li><li><strong>A human stays in control.</strong> Agents propose and execute defined tasks; the actions that matter (publishing, spending, anything live) wait for your "go."</li><li><strong>Built to scale with you</strong> - start with one or two agents on your biggest bottleneck, add more as you grow. The same kind of system NIRO runs its own business on.</li></ul><p><strong>Who it's for:</strong> Ambitious owners and lean teams who feel capped by how many hours are in a day - businesses that want the output of a larger team without the overhead.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-agents'); document.getElementById('contact').scrollIntoView();">Build my AI agent team</button></div></div></div></div>

    <!-- Content agent (flagship chip) -->
    <div id="modal-agent-content" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-agent-content')">&times;</span><div class="modal-title">Content agent - drafts ready for your approval</div><div class="modal-text"><p>Your content agent turns a blank page into a finished draft. Posts, emails, articles - written in your tone, on the topics that matter to your business, ready in minutes instead of hours.</p><p>It learns the way you write and the points you want to make, so each draft already sounds like you. You spend your time refining and approving, not staring at an empty screen.</p><p><strong>A human stays in control:</strong> the agent drafts and prepares - you read, edit, and approve. Nothing publishes on its own.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-agent-content'); document.getElementById('contact').scrollIntoView();">See it on my business</button></div></div></div></div>

    <!-- Social agent (flagship chip) -->
    <div id="modal-agent-social" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-agent-social')">&times;</span><div class="modal-title">Social agent - plans and prepares your posts</div><div class="modal-text"><p>Your social agent plans the calendar and prepares the posts - captions, hooks, and a steady rhythm of content - all built around your brand voice and what your audience actually responds to.</p><p>No more scrambling for "what do I post today." You get a ready-to-go plan and finished captions, so showing up consistently stops being a weekly headache.</p><p><strong>A human stays in control:</strong> every post is prepared for your review and waits for your approval before it goes live.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-agent-social'); document.getElementById('contact').scrollIntoView();">Plan my content</button></div></div></div></div>

    <!-- Follow-up agent (flagship chip) -->
    <div id="modal-agent-followup" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-agent-followup')">&times;</span><div class="modal-title">Follow-up agent - never lets a lead go cold</div><div class="modal-text"><p>Most leads are lost in the silence after the first contact. Your follow-up agent closes that gap: it reaches out at the right moment - by email or message - so every lead gets a timely, consistent follow-up.</p><p>It connects straight to your CRM, knows who hasn't replied, and keeps the conversation warm until they're ready - so you walk into a ready lead instead of chasing a cold one.</p><p><strong>A human stays in control:</strong> the agent handles the timing and the nudges; you decide the messaging and step in to close.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-agent-followup'); document.getElementById('contact').scrollIntoView();">Stop leads going cold</button></div></div></div></div>

    <!-- Reporting agent (flagship chip) -->
    <div id="modal-agent-reporting" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-agent-reporting')">&times;</span><div class="modal-title">Reporting agent - your numbers, every week</div><div class="modal-text"><p>Your reporting agent pulls your numbers together for you - leads, conversions, and performance - into one clear summary that lands every week, with no spreadsheets to build by hand.</p><p>You get a living report that's always current, so you can see what's working and where to focus instead of guessing or digging through tabs.</p><p><strong>A human stays in control:</strong> the agent gathers and presents the data; the decisions on what to do next stay with you.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-agent-reporting'); document.getElementById('contact').scrollIntoView();">See my numbers clearly</button></div></div></div></div>

    <!-- Make -->
    <div id="modal-make" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-make')">&times;</span><div class="modal-title">Make Automations - the work happens by itself</div><div class="modal-text"><p>Your apps stop living on separate islands. New leads, orders, and updates flow automatically from one system to the next - no copy-paste, no things slipping through the cracks.</p><p><strong>What's included:</strong></p><ul class="modal-list"><li>Connect the tools you already use - forms, ads, email, spreadsheets, payments, calendars, CRM - into one automated workflow.</li><li>Automatic data sync between systems, so a new lead or order is everywhere it needs to be within seconds.</li><li>Multi-step workflows with smart rules: route, filter, and tag information based on conditions you set.</li><li>Built-in error handling and alerts, so if something fails you know about it instead of hearing it from an angry customer.</li></ul><p><strong>Who it's for:</strong> Business owners juggling several disconnected apps, or anyone still moving information by hand between tools.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-make'); document.getElementById('contact').scrollIntoView();">Automate my workflow</button></div></div></div></div>

    <!-- ManyChat -->
    <div id="modal-manychat" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-manychat')">&times;</span><div class="modal-title">ManyChat Chatbots - never miss a message</div><div class="modal-text"><p>Reply to every comment, DM, and message instantly - qualify the serious leads, answer the routine questions, and book meetings - without you watching your phone all day.</p><p><strong>What's included:</strong></p><ul class="modal-list"><li>Instant auto-replies on Instagram, Facebook Messenger, and WhatsApp, 24/7.</li><li>Step-by-step lead qualification flows that ask the right questions and sort hot leads from tire-kickers.</li><li>Keyword, comment, and story-reply triggers - turn social engagement into captured leads automatically.</li><li>Hand-off to your team or your CRM at the right moment, so a warm lead is never left waiting.</li></ul><p><strong>Who it's for:</strong> Businesses getting steady DMs, comments, or WhatsApp messages they can't keep up with - especially anyone running ads or active on Instagram and Facebook.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-manychat'); document.getElementById('contact').scrollIntoView();">Set up my chatbot</button></div></div></div></div>

    <!-- Airtable CRM -->
    <div id="modal-crm" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-crm')">&times;</span><div class="modal-title">CRM Systems (Airtable) - one home for every lead</div><div class="modal-text"><p>Stop losing track of who to follow up with. Every lead lands in one tidy system, tagged by source, with its status always up to date - so nobody slips away and nothing gets forgotten.</p><p><strong>What's included:</strong></p><ul class="modal-list"><li>A custom CRM built around your business - your stages, your fields, your pipeline, not a rigid template.</li><li>Every lead channel (website, Facebook, Instagram, WhatsApp, ads) feeds in automatically, tagged with where it came from.</li><li>Clear views and dashboards: see your pipeline, today's follow-ups, and where each deal stands at a glance.</li><li>Internal automations - status changes, reminders, and notifications that fire on their own as a lead moves through your pipeline.</li></ul><p><strong>Who it's for:</strong> Anyone managing leads in their head, their inbox, or a messy spreadsheet. Perfect for small teams that need to see the full pipeline without paying for heavy enterprise software.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-crm'); document.getElementById('contact').scrollIntoView();">Organize my leads</button></div></div></div></div>

    <!-- AI Chatbots -->
    <div id="modal-aibot" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-aibot')">&times;</span><div class="modal-title">AI Chatbots - smart answers, 24/7</div><div class="modal-text"><p>An AI assistant on your website or WhatsApp that understands real questions, answers them in your tone, and guides people toward booking, buying, or leaving their details - even at 2 a.m.</p><p><strong>What's included:</strong></p><ul class="modal-list"><li>An AI chatbot trained on your business - your services, pricing logic, FAQs, and the way you talk.</li><li>Handles the repetitive 80% of questions (availability, "how it works," pricing) so your team only handles what truly needs a human.</li><li>One clear goal per bot: book a call, capture a lead, or guide a simple sale - not just chat for the sake of chatting.</li><li>Smart hand-off: when a conversation gets serious or complex, it passes the person (and the full context) to you.</li></ul><p><strong>Who it's for:</strong> Businesses answering the same questions all day, and owners who want support and first-touch sales running after hours without adding headcount.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-aibot'); document.getElementById('contact').scrollIntoView();">Add an AI assistant</button></div></div></div></div>

    <!-- Social (marketing add-on) -->
    <div id="modal-social" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-social')">&times;</span><div class="modal-title">Social Media Management - turning followers into clients</div><div class="modal-text"><p>Social media management with us is not just "uploading a nice post", but building visibility that projects authority and professionalism. We create a smart content strategy that combines your business values with what your audience really wants to hear.</p><p><strong>The process includes:</strong></p><ul class="modal-list"><li>Cracking the brand's unique Tone of Voice.</li><li>Graphic design tailored to the psychology of scrolling (Stop Scroll).</li><li>Managing paid campaigns to precise audiences (Remarketing, Look-alike).</li><li>Responding to comments and creating live interaction.</li></ul><p><strong>Your Profit:</strong> You turn from "just another business" into a leading brand in your field. When clients are ready to buy, you are their first and natural choice.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-social'); document.getElementById('contact').scrollIntoView();">I want a strong brand!</button></div></div></div></div>

    <!-- Google (marketing add-on) -->
    <div id="modal-google" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-google')">&times;</span><div class="modal-title">Google Ads & SEO - being there at the moment of truth</div><div class="modal-text"><p>Appearing on Google means being there exactly at the moment the client is looking for a solution to their problem. We don't pour budget on general words; we work using the SKAGs method to ensure maximum relevance and a high Quality Score that lowers costs.</p><p><strong>The process includes:</strong></p><ul class="modal-list"><li>In-depth keyword research to locate "money on the floor".</li><li>Writing ads that hit the customer's exact pain point.</li><li>Daily optimization to improve conversion rates (CTR & CR).</li><li>Organic promotion (SEO) to build a long-term asset.</li></ul><p><strong>Your Profit:</strong> A steady stream of "hot" leads who have already decided to buy and are just looking for who to buy from.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-google'); document.getElementById('contact').scrollIntoView();">Bring me hot leads!</button></div></div></div></div>

    <!-- Web (marketing add-on) -->
    <div id="modal-web" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-web')">&times;</span><div class="modal-title">Landing Pages & Websites - your sales machine</div><div class="modal-text"><p>Your website or landing page is the face of your business digitally. You have exactly 3 seconds to convince the surfer to stay. We build pages that look visually stunning and are psychologically structured to drive action - and plug straight into your automation.</p><p><strong>The process includes:</strong></p><ul class="modal-list"><li>User Experience (UX) characterization for a smooth purchasing path.</li><li>Marketing copywriting that speaks to benefits and not just features.</li><li>Perfect responsive design for all screen types.</li><li>Implementation of tracking tools (Analytics) for precise monitoring.</li></ul><p><strong>Your Profit:</strong> A sales machine that works 24/7. Our pages increase conversion rates - for every dollar you spend on advertising, you get more inquiries and sales.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 12px 34px;" onclick="closeModal('modal-web'); document.getElementById('contact').scrollIntoView();">Build me a digital asset!</button></div></div></div></div>

    <!-- ============ TECH MARQUEE (infinite scroll) ============ -->
    <!-- The track is duplicated 1:1; the -50% keyframe makes the loop seamless. CSS-only, no JS. -->
    <div class="tech-marquee" aria-hidden="true">
        <div class="marquee-track">
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/make/8B7FE8" alt="">Make</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAYFBMVEX///8AAACKioqvr68WFhaysrLz8/M1NTVycnKNjY34+PhXV1f7+/vl5eUQEBDZ2dnExMSUlJQmJiZDQ0OoqKg7OzttbW28vLzOzs6dnZ18fHyCgoIwMDBfX19RUVEeHh43HcgSAAADI0lEQVR4nO2a22KCMAyGLeBxnBFBJ/j+b7m5KURIE2wp20X+S4jtRw9Jk7paiUQikUgkEolEIpHIpcLEzzwv86O/6HyTZFvVyUvChbtPd+pFcbZZsv9q0P1dl+UmIvTycf9KnZYag+QD6/6+EJZZB9VN079SPvvjev2+/OSlibW+f9Wwy+BT/2O9vANowY8p04oD8EwA9gAgpU1bbh3aAqRbxpabA0uApOBsL04BNoj7GcopwHmCMTMHVgA1sQE7MfvABiDkFuCPmEVgAzDNh7TOABLSA3Uq6XhgDnDQRaCBrvQqNAdYB9OM89oNQNRMNA7WbgCOU43joxOAiPXBnc5OACYPgFKZEwDEBzXn4wU7GnoOAMLxKSA4f2+3w34hgFU5fPRYahUyBA4AsvEAPE6f2PnAACBvP55qMX+bnYZPnhFnJoBdtHkqwiLe6Tp4UDxPfvVMAP1JcoMB5MNhSZ/m6RDNDcBQ+y7gYQHCwA+8CQDCDeafDDzhmwD9J4aIH4idA5T9AGAhMqDzwxkAPvvWasQPOQfIQapaIe9v9LHYHuDUN3bAWjM5Eb0FAAYgQryAuiZItzMClKCxBDPY0vmxNUAKGkMThXLc6ZwAN/h9aKZWuAXIQNoRoRYmmdEbAHCF4bl64xRgB2cArRVCP+UAAJ75KzxXpEOBJUAJncwFt0nHnc4HsAPlsqjFbWg/ZAfwEmmPmmydqdZaAZQg89bWq+j+7QBAHFrVo1RhAQC4B3QFM8YR2gEAJ6BbgpwfsgKAYUZbMqbPxHYAcAa0JVO6PmIHAPYAHofuYtyADUABdjiWlv/KqFw/DQDMbojHoW/FDgGY0/CvCncA0A3qa5aNOwBwcYTVRR7acxd35gBgfxFVa7pIaAOw7Y8C1L0NnZXYAIAbQerexB1AvwmpoumN80PGACDnpW4OW/bm1BSg6D7toIuDd/FXt6YATbe9yKvTl0veWQH6qyiybM7uQmOAzgugGfHYTKt9HIykLgCgRAyCOO/mdqeQ950Ze3m+SnxEde8/wzVm4Pdfhr9/qPqTv/OIRCKRSCQSiUQikUj03/UF6usxFLYj2e4AAAAASUVORK5CYII=" alt="" style="filter: invert(1);">ManyChat</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/anthropic/8B7FE8" alt="">Claude</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/claudecode/8B7FE8" alt="">Claude Code</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/airtable/8B7FE8" alt="">Airtable</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item">🤖 AI Agents</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/whatsapp/25D366" alt="">WhatsApp</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <!-- duplicate set for seamless loop -->
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/make/8B7FE8" alt="">Make</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAYFBMVEX///8AAACKioqvr68WFhaysrLz8/M1NTVycnKNjY34+PhXV1f7+/vl5eUQEBDZ2dnExMSUlJQmJiZDQ0OoqKg7OzttbW28vLzOzs6dnZ18fHyCgoIwMDBfX19RUVEeHh43HcgSAAADI0lEQVR4nO2a22KCMAyGLeBxnBFBJ/j+b7m5KURIE2wp20X+S4jtRw9Jk7paiUQikUgkEolEIpHIpcLEzzwv86O/6HyTZFvVyUvChbtPd+pFcbZZsv9q0P1dl+UmIvTycf9KnZYag+QD6/6+EJZZB9VN079SPvvjev2+/OSlibW+f9Wwy+BT/2O9vANowY8p04oD8EwA9gAgpU1bbh3aAqRbxpabA0uApOBsL04BNoj7GcopwHmCMTMHVgA1sQE7MfvABiDkFuCPmEVgAzDNh7TOABLSA3Uq6XhgDnDQRaCBrvQqNAdYB9OM89oNQNRMNA7WbgCOU43joxOAiPXBnc5OACYPgFKZEwDEBzXn4wU7GnoOAMLxKSA4f2+3w34hgFU5fPRYahUyBA4AsvEAPE6f2PnAACBvP55qMX+bnYZPnhFnJoBdtHkqwiLe6Tp4UDxPfvVMAP1JcoMB5MNhSZ/m6RDNDcBQ+y7gYQHCwA+8CQDCDeafDDzhmwD9J4aIH4idA5T9AGAhMqDzwxkAPvvWasQPOQfIQapaIe9v9LHYHuDUN3bAWjM5Eb0FAAYgQryAuiZItzMClKCxBDPY0vmxNUAKGkMThXLc6ZwAN/h9aKZWuAXIQNoRoRYmmdEbAHCF4bl64xRgB2cArRVCP+UAAJ75KzxXpEOBJUAJncwFt0nHnc4HsAPlsqjFbWg/ZAfwEmmPmmydqdZaAZQg89bWq+j+7QBAHFrVo1RhAQC4B3QFM8YR2gEAJ6BbgpwfsgKAYUZbMqbPxHYAcAa0JVO6PmIHAPYAHofuYtyADUABdjiWlv/KqFw/DQDMbojHoW/FDgGY0/CvCncA0A3qa5aNOwBwcYTVRR7acxd35gBgfxFVa7pIaAOw7Y8C1L0NnZXYAIAbQerexB1AvwmpoumN80PGACDnpW4OW/bm1BSg6D7toIuDd/FXt6YATbe9yKvTl0veWQH6qyiybM7uQmOAzgugGfHYTKt9HIykLgCgRAyCOO/mdqeQ950Ze3m+SnxEde8/wzVm4Pdfhr9/qPqTv/OIRCKRSCQSiUQikUj03/UF6usxFLYj2e4AAAAASUVORK5CYII=" alt="" style="filter: invert(1);">ManyChat</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/anthropic/8B7FE8" alt="">Claude</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/claudecode/8B7FE8" alt="">Claude Code</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/airtable/8B7FE8" alt="">Airtable</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item">🤖 AI Agents</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
            <span class="marquee-item"><img src="https://cdn.simpleicons.org/whatsapp/25D366" alt="">WhatsApp</span>
            <span class="marquee-item"><span class="sep">&#9670;</span></span>
        </div>
    </div>

    <!-- ============ FOOTER ============ -->
    <footer>
        <div>
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png" alt="Niro Digital Logo" style="height:50px; width:auto; margin-bottom:20px;"><br>
            <div class="footer-links">
                <a href="#contact">Free Automation Audit</a>
                <a href="https://wa.me/972537142298" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                <a href="https://www.nirodigital.co.il/en/">nirodigital.co.il</a>
            </div>
            2026 © NIRO Digital | Automations & AI Agents for Growing Businesses<br>
            <a href="javascript:void(0)" onclick="toggleAccMenu()">Accessibility Statement</a>
        </div>
    </footer>

    <a class="side-btn btn-wa" href="https://wa.me/972537142298" target="_blank" rel="noopener noreferrer"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="38"></a>
    <div class="side-btn btn-acc" onclick="toggleAccMenu()">♿</div>

    <div id="acc-menu">
        <button onclick="adjustZoom(1.1)">➕ Increase Site</button>
        <button onclick="adjustZoom(1)">🔄 Reset</button>
        <button onclick="document.body.classList.toggle('grayscale')">🌓 B&W Mode</button>
        <button onclick="toggleAccMenu()">❌ Close Menu</button>
    </div>

    <script>
        function toggleAccMenu() {
            var m = document.getElementById('acc-menu');
            m.style.display = (m.style.display === 'block') ? 'none' : 'block';
        }

        function adjustZoom(level) {
            document.body.style.zoom = level;
        }

        function openModal(id) {
            document.getElementById(id).style.display = "flex";
            document.body.style.overflow = "hidden";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
            document.body.style.overflow = "auto";
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal-overlay')) {
                event.target.style.display = "none";
                document.body.style.overflow = "auto";
            }
        }

        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const isActive = item.classList.contains('active');
                document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
                if (!isActive) item.classList.add('active');
            });
        });

        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        window.onload = reveal;

        function handleFormSubmit(e) {
            e.preventDefault();
            var form = e.target;
            var btn = form.querySelector('button');
            btn.innerText = "Sending...";
            btn.disabled = true;

            var params = new URLSearchParams();
            params.append('client_name',    form.client_name    ? form.client_name.value    : '');
            params.append('client_phone',   form.client_phone   ? form.client_phone.value   : '');
            params.append('client_email',   form.client_email   ? form.client_email.value   : '');
            params.append('client_message', form.client_message ? form.client_message.value : '');
            params.append('source', 'אתר - דף אנגלית');

            fetch('https://hook.eu1.make.com/frzwgajh6u8nxhw3ba7dljfewnjg16qt', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' },
                body: params.toString()
            })
            .then(function () { window.location.href = '/en/thank-you/'; })
            .catch(function () { btn.innerText = "Oops, please try again"; btn.disabled = false; });
            return false;
        }

        /* ===== INTERACTIVE LEAK DIAGNOSTIC ===== */
        /* Pure vanilla JS. Maps 4 answers to one of NIRO's 6 funnel stations and renders a personalized result. */
        /* The result CTA scrolls to the EXISTING #contact form - it does NOT submit anything itself. */
        (function () {
            var diagAnswers = [null, null, null, null];
            var TOTAL_Q = 4;

            // Each answer carries the funnel station it points to + a "weight" (how badly it leaks).
            // Stations follow the 6-station model: response, destination, capture, followup, close.
            var MAP = {
                0: { fast: null,            hours: { stage: 'response', w: 2 }, slow:     { stage: 'response', w: 3 } },
                1: { crm: null,             spread:{ stage: 'capture',  w: 2 }, scattered:{ stage: 'capture',  w: 3 } },
                2: { auto: null,            manual:{ stage: 'followup', w: 2 }, never:    { stage: 'followup', w: 3 } },
                3: { bot: null,             me:    { stage: 'response', w: 1 }, noone:    { stage: 'followup', w: 2 } }
            };

            // Copy for each leaking station (positive-framed: pain -> the fix that closes it).
            var RESULT = {
                response: {
                    name: 'slow lead response',
                    label: 'Instant response',
                    cost: 'Leads message the businesses that <strong>reply first</strong>. Every hour a new lead waits, the odds of closing them drop - and most of that gap happens while you are simply busy doing the work.',
                    fix: 'The fix is an instant first reply (WhatsApp or email) that goes out the moment a lead lands - so nobody cools off while you are on the job. That is exactly what we map in the free audit.',
                    cta: 'Plug my response leak - free audit'
                },
                capture: {
                    name: 'leads that scatter and get lost',
                    label: 'Auto-capture',
                    cost: 'When leads live across your inbox, WhatsApp, DMs and your memory, some quietly slip through the cracks - and you can not follow up on what you can not see.',
                    fix: 'The fix is one organized home where every lead lands automatically, tagged by source, status always current. Nothing forgotten. We map this for you, free, in the audit.',
                    cta: 'Capture every lead - free audit'
                },
                followup: {
                    name: 'follow-ups that never happen',
                    label: 'Smart follow-up',
                    cost: 'Most sales need more than one touch - yet a lead who does not reply usually just goes cold, because the follow-up depends on you remembering at the right moment.',
                    fix: 'The fix is a gentle, automatic follow-up sequence that nudges quiet leads after an hour, a day, three days - on its own. You step in warm, ready to close. We design it in the free audit.',
                    cta: 'Automate my follow-up - free audit'
                }
            };

            function show(stepSel) {
                document.querySelectorAll('.diag-step').forEach(function (s) { s.classList.remove('active'); });
                var el = document.querySelector('.diag-step[data-step="' + stepSel + '"]');
                if (el) el.classList.add('active');
            }

            function setProgress(qIndex) {
                var pct = Math.round((qIndex / TOTAL_Q) * 100);
                var fill = document.getElementById('diagBarFill');
                var label = document.getElementById('diagBarLabel');
                if (fill) fill.style.width = pct + '%';
                if (label) label.textContent = (qIndex >= TOTAL_Q) ? 'Done' : ('Question ' + (qIndex + 1) + ' of ' + TOTAL_Q);
            }

            window.diagAnswer = function (qIndex, value) {
                diagAnswers[qIndex] = value;
                if (qIndex < TOTAL_Q - 1) {
                    setProgress(qIndex + 1);
                    show(qIndex + 1);
                } else {
                    setProgress(TOTAL_Q);
                    show('calc');
                    setTimeout(diagComputeResult, 1100);
                }
            };

            function diagComputeResult() {
                // Tally weighted votes per station; pick the worst leak. Ties resolve by station priority.
                var scores = { response: 0, capture: 0, followup: 0 };
                for (var q = 0; q < TOTAL_Q; q++) {
                    var ans = diagAnswers[q];
                    var m = MAP[q] && MAP[q][ans];
                    if (m) scores[m.stage] += m.w;
                }

                var priority = ['response', 'capture', 'followup'];
                var leak = null, best = -1;
                priority.forEach(function (st) {
                    if (scores[st] > best) { best = scores[st]; leak = st; }
                });

                // All-green path: nothing is leaking badly.
                if (best <= 0) {
                    renderClean();
                    return;
                }

                var r = RESULT[leak];
                document.getElementById('diagLeakName').textContent = r.name;
                document.getElementById('diagLeakCost').innerHTML = r.cost;
                document.getElementById('diagLeakFix').innerHTML = r.fix;
                document.getElementById('diagCtaText').textContent = r.cta;

                document.querySelectorAll('#diagMap .stage').forEach(function (s) { s.classList.remove('leaking'); });
                var mapStage = document.querySelector('#diagMap .stage[data-stage="' + leak + '"]');
                if (mapStage) mapStage.classList.add('leaking');

                show('result');
            }

            function renderClean() {
                document.getElementById('diagLeakName').textContent = 'almost nowhere - you are ahead of most';
                document.getElementById('diagLeakCost').innerHTML = 'Impressive. Your funnel already captures, responds and follows up better than most businesses we see. The biggest wins now come from <strong>tightening and scaling</strong> what already works.';
                document.getElementById('diagLeakFix').innerHTML = 'The free audit shows where to add leverage next - more leads through the same tight system, and AI agents taking even more off your plate.';
                document.getElementById('diagCtaText').textContent = 'Show me what to scale - free audit';
                document.querySelectorAll('#diagMap .stage').forEach(function (s) { s.classList.remove('leaking'); });
                var closeStage = document.querySelector('#diagMap .stage[data-stage="close"]');
                if (closeStage) closeStage.classList.add('leaking');
                show('result');
            }

            window.diagRestart = function () {
                diagAnswers = [null, null, null, null];
                setProgress(0);
                document.querySelectorAll('#diagMap .stage').forEach(function (s) { s.classList.remove('leaking'); });
                show(0);
            };

            window.diagGoToContact = function (e) {
                e.preventDefault();
                var t = document.getElementById('contact');
                if (t) t.scrollIntoView({ behavior: 'smooth' });
            };

            // init
            setProgress(0);
        })();
    </script>

</body>
</html>
