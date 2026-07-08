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

    <meta name="description" content="Niro Digital Marketing - Out-of-the-box digital marketing solutions, Performance Marketing, Social Media Management, Google Ads, and B2B Automations.">
    <meta property="og:title" content="Niro Digital Marketing | Performance Marketing">
    <meta property="og:description" content="Out-of-the-box digital marketing solutions, sales psychology, and automations that save time and increase profits.">
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
      "description": "Out-of-the-box digital marketing solutions. Performance Marketing, Website Building, Social Media Management, and B2B Automations.",
      "url": "https://www.nirodigital.co.il/en/",
      "telephone": "+972559322991",
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

    <title>Niro Digital Marketing | Performance Marketing</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --blue: #0b1f5b;
            --red: #e6463a;
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

        /* Header Styling - Flipped to LTR */
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
        header img { height: 85px; width: auto; }

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
            min-width: 220px;
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

        .header-social { display: flex; gap: 12px; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 20px; }
        .header-social a { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; font-size: 16px; transition: 0.3s; }
        .hs-fb { background: var(--fb); }
        .hs-ig { background: var(--ig); }
        .header-social a:hover { transform: translateY(-3px); opacity: 0.9; }

        .lang-btn { color: var(--gold); border: 1px solid var(--gold); padding: 5px 15px !important; border-radius: 20px; }
        .lang-btn:hover { background: var(--gold); color: var(--dark) !important; }

        /* Hero Section */
        .hero {
            min-height: 85vh;
            display: flex;
            align-items: center;
            padding: 160px 80px 60px;
            background: radial-gradient(circle at center, #1a2a5a 0%, var(--dark) 70%);
        }
        .hero h1 { font-size: 72px; font-weight: 900; margin: 0; line-height: 1.1; }
        .hero h1 span { color: var(--red); }
        .hero h2 { font-size: 32px; margin-top: 15px; font-weight: 800; color: var(--red); }
        .hero .perf-text { color: #fff; font-size: 28px; display: block; margin-top: 10px; font-weight: 900; opacity: 0.8; }

        /* Section Commons */
        section { padding: 100px 80px; }
        .reveal { opacity: 0; transform: translateY(40px); transition: 1s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .reveal.active { opacity: 1; transform: translateY(0); }

        /* About Section */
        .about { background: var(--blue); position: relative; overflow: hidden; }
        .about-wrap { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; max-width: 1300px; margin: 0 auto; align-items: center; }
        .about h2 { font-size: 48px; font-weight: 900; margin-bottom: 20px; }
        .about h3 { color: var(--red); font-size: 24px; margin-bottom: 20px; }
        .about p { font-size: 19px; margin-bottom: 20px; opacity: 0.9; }
        .about img {
            width: 100%;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            transition: 0.5s;
        }
        .about img:hover { transform: scale(1.02); }

        /* Services Grid */
        .services { background: #fff; color: var(--blue); }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; }
        .card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #eee;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.4s;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }
        .card:hover { transform: translateY(-15px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-color: var(--red); }
        .card img { width: 100%; height: 220px; object-fit: cover; }
        .card-content { padding: 25px; text-align: left; flex-grow: 1; display: flex; flex-direction: column; }
        .card h3 { font-size: 24px; margin-bottom: 15px; font-weight: 800; color: var(--red); }
        .card p { font-size: 16px; color: #444; margin: 0; line-height: 1.7; }
        .read-more-btn {
            margin-top: 15px;
            color: var(--blue);
            font-weight: 800;
            font-size: 14px;
            text-decoration: underline;
            align-self: flex-start;
        }

        /* Knowledge Center Styles */
        .knowledge-section {
            background: #fff;
            color: var(--blue);
            border-top: 1px solid #eee;
            padding-top: 120px;
            padding-bottom: 120px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .k-header {
            max-width: 900px;
            margin: 0 auto 60px auto;
        }
        .k-header h2 {
            font-size: 56px;
            font-weight: 900;
            color: var(--blue);
            margin: 0;
            text-transform: uppercase;
        }
        .k-header h2 span { color: var(--red); }
        .k-header p {
            font-size: 22px;
            color: #666;
            margin-top: 15px;
            font-weight: 300;
        }

        .knowledge-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; text-align: left; width: 100%; }
        .knowledge-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: default;
            border: 1px solid #eee;
            position: relative;
        }
        .knowledge-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); border-color: var(--red); }

        .k-img-wrap { width: 100%; height: 200px; overflow: hidden; position: relative; }
        .k-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .knowledge-card:hover .k-img-wrap img { transform: scale(1.1); }
        .k-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--red);
            color: #fff;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 800;
            z-index: 2;
        }

        .k-body { padding: 25px; }
        .k-title { font-weight: 800; font-size: 20px; margin-bottom: 10px; display: block; color: var(--blue); line-height: 1.3; }
        .k-excerpt { font-size: 15px; color: #777; display: block; margin-bottom: 15px; }

        .k-content {
            display: block;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-size: 15px;
            color: #444;
            line-height: 1.8;
            animation: fadeIn 0.5s;
        }
        .knowledge-card.active .k-content { display: block; }
        .knowledge-card.active { border-color: var(--red); }


        /* FAQ Section */
        .faq-section { background: var(--light-bg); color: var(--blue); }
        .faq-container { max-width: 900px; margin: 0 auto; }
        .faq-item { background: #fff; margin-bottom: 15px; border-radius: 12px; border: 1px solid #eee; overflow: hidden; transition: 0.3s; }
        .faq-question { padding: 20px 25px; font-weight: 800; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }
        .faq-question span { font-size: 24px; color: var(--red); transition: 0.3s; }
        .faq-answer { padding: 0 25px; max-height: 0; overflow: hidden; transition: 0.4s ease; color: #555; font-size: 17px; }
        .faq-item.active { border-color: var(--red); box-shadow: 0 5px 15px rgba(230,70,58,0.1); }
        .faq-item.active .faq-answer { padding: 0 25px 20px; max-height: 300px; }
        .faq-item.active .faq-question span { transform: rotate(45deg); }

        /* Testimonials */
        .testimonials { background: var(--dark); text-align: center; }
        .t-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 50px; max-width: 1200px; margin: 80px auto; }
        .t-card { background: #fff; padding: 50px 30px 30px; border-radius: 20px; color: var(--blue); text-align: left; position: relative; margin-top: 40px; }
        .t-card img.t-logo { width: 80px; height: 80px; border-radius: 50%; position: absolute; top: -40px; left: 30px; border: 4px solid var(--dark); background: #fff; object-fit: cover; }
        .t-stars { color: var(--gold); margin-bottom: 15px; font-size: 18px; }
        .t-name { font-weight: 900; display: block; font-size: 20px; color: var(--blue); }
        .t-role { color: var(--red); font-weight: 700; font-size: 15px; margin-bottom: 15px; display: block; }

        /* Contact Box */
        .contact { background: var(--blue); }
        .contact-box { max-width: 550px; margin: 0 auto; background: #fff; padding: 45px; border-radius: 30px; color: var(--blue); box-shadow: 0 20px 60px rgba(0,0,0,0.2); }
        .contact-box h2 { text-align: center; font-weight: 900; font-size: 32px; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
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

        /* Service Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 5000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background: #fff;
            width: 100%;
            max-width: 700px;
            border-radius: 25px;
            padding: 40px;
            position: relative;
            color: var(--blue);
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            animation: zoomIn 0.3s ease;
        }
        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 30px;
            color: #999;
            cursor: pointer;
            line-height: 1;
        }
        .modal-close:hover { color: var(--red); }
        .modal-title { font-size: 32px; font-weight: 900; margin-bottom: 20px; color: var(--blue); border-bottom: 2px solid var(--red); display: inline-block; padding-bottom: 10px; }
        .modal-text { font-size: 18px; line-height: 1.8; color: #444; }
        .modal-text strong { color: var(--red); font-weight: 800; }
        .modal-list { margin: 20px 0; padding-left: 20px; }
        .modal-list li { margin-bottom: 10px; font-size: 17px; }
        .modal-cta { margin-top: 30px; text-align: center; }

        /* Floating Buttons & WA Animation */
        .side-btn { position: fixed; bottom: 30px; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 2000; cursor: pointer; transition: 0.3s; box-shadow: 0 8px 25px rgba(0,0,0,0.2); }

        @keyframes pulse-green {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        .btn-wa {
            right: 30px;
            background: var(--wa);
            animation: pulse-green 2s infinite;
        }

        .btn-acc { left: 30px; background: var(--blue); border: 2px solid #fff; color: #fff; font-size: 28px; text-decoration: none; }
        .side-btn:hover { transform: translateY(-5px); }

        /* Accessibility Menu */
        #acc-menu {
            display: none;
            position: fixed;
            bottom: 105px;
            left: 30px;
            background: #fff;
            color: var(--blue);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.5);
            z-index: 2001;
            width: 250px;
        }
        #acc-menu button {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #eee;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'Heebo';
            font-weight: 700;
            text-align: left;
            transition: 0.2s;
        }
        #acc-menu button:hover { background: #f0f2f5; border-color: var(--blue); }

        footer { text-align: center; padding: 60px 20px; background: var(--dark); font-size: 14px; color: #888; border-top: 1px solid rgba(255,255,255,0.05); }
        footer a { color: var(--red); text-decoration: none; font-weight: 700; }

        /* Responsive */
        @media (max-width: 768px) {
            header { height: 85px; padding: 0 20px; }
            header img { height: 60px; }
            .nav-area { display: none; }
            .hero { padding: 140px 20px 60px; text-align: center; min-height: 60vh; }
            .hero h1 { font-size: 44px; }
            .hero h2 { font-size: 24px; }
            section { padding: 70px 25px; }
            .about-wrap { grid-template-columns: 1fr; text-align: center; }
            .about img { max-width: 300px; margin: 0 auto; transform: none; }
            .t-card { margin-top: 60px; }
            .modal-content { padding: 25px; }
        }
    </style>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXRL4W23"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <header>
    <img src="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png" alt="Niro Digital Logo">
    <div class="nav-area">
        <div class="nav-menu">
            <a href="#home" class="nav-link">Home</a>
            <a href="#about" class="nav-link">About</a>

            <div class="dropdown">
                <a href="#services" class="nav-link">Services</a>
                <div class="dropdown-content">
                    <a href="javascript:void(0)" onclick="openModal('modal-social')">Social Media</a>
                    <a href="javascript:void(0)" onclick="openModal('modal-google')">Google Ads & SEO</a>
                    <a href="javascript:void(0)" onclick="openModal('modal-web')">Landing Pages</a>
                    <a href="javascript:void(0)" onclick="openModal('modal-auto')">B2B Automations</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#knowledge" class="nav-link">Knowledge Center</a>
                <div class="dropdown-content">
                    <a href="javascript:void(0)" onclick="scrollToTopic(0)">Psychology & Sales</a>
                    <a href="javascript:void(0)" onclick="scrollToTopic(1)">Remarketing</a>
                    <a href="javascript:void(0)" onclick="scrollToTopic(2)">Business Automation</a>
                    <a href="javascript:void(0)" onclick="scrollToTopic(3)">Advanced SEO</a>
                    <a href="javascript:void(0)" onclick="scrollToTopic(4)">Data & Analytics</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#faq-section" class="nav-link">FAQ</a>
                <div class="dropdown-content">
                    <a href="#faq-section">Automation</a>
                    <a href="#faq-section">Paid Ads</a>
                    <a href="#faq-section">Budgets</a>
                    <a href="#faq-section">General</a>
                </div>
            </div>

            <a href="#testimonials" class="nav-link">Testimonials</a>

            <a href="/" class="nav-link lang-btn" title="Hebrew"><i class="fas fa-globe"></i> HE</a>
        </div>
        <div class="header-social">
            <a href="https://www.facebook.com/profile.php?id=61578880211111" target="_blank" rel="noopener noreferrer" class="hs-fb"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/nvb.1982/" target="_blank" rel="noopener noreferrer" class="hs-ig"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</header>

<div class="hero reveal" id="home">
    <div>
        <h1>Niro <span>Digital Marketing</span></h1>
        <h2>Out-of-the-box digital marketing solutions</h2>
        <span class="perf-text">Performance Marketing & Automation</span>
    </div>
</div>

<section class="about reveal" id="about">
    <div class="about-wrap">
        <div>
            <h2>Nice to meet you?</h2>
            <h3>Who am I – Nir, your digital marketer.</h3>
            <p>I believe that true marketing starts with human understanding. Before numbers, campaigns, and algorithms - stand the people, the story, and the vision of the business. My role is to connect them smartly, accurately, and correctly.</p>
            <p>Over time, I've developed an approach based on out-of-the-box creative thinking, a personalized strategy for each client, and the ability to intelligently analyze data using AI tools combined with the knowledge and experience I've acquired.</p>
            <p>Artificial Intelligence helps understand audience behavior, identify opportunities, and sharpen messages while I bring the human, sensitive side and personal connection to the process.</p>
            <p>I don't believe in marketing that wastes money on "exposure". I believe in marketing that generates real results - revenue and clients with a genuine connection to your brand.</p>
            <p>Every business I accompany receives personal attention, mental flexibility, and a process built exactly around it.</p>
            <p><strong>My goal is simple: that you won't be just another business trying to stand out, but a leading business - and reap the profits!</strong></p>
        </div>
        <div style="text-align: center;">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2025/11/תמונה-אתר-הבית-scaled.jpg" alt="Nir Digital">
        </div>
    </div>
</section>

<section class="services reveal" id="services">
    <h2 style="text-align:center; color:var(--blue); margin-bottom:60px; font-size:48px; font-weight:900;">My Services</h2>
    <div class="grid">
        <div class="card" onclick="openModal('modal-social')">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/סושיאל-מיקס-מגניב-לדף-נחיתה-scaled.jpg" alt="Social Media">
            <div class="card-content">
                <h3>Social Media Management</h3>
                <p>A complete envelope of strategy and content that builds a strong and memorable brand. We take care of the creative, ongoing management, and community building.<br><strong>Click for more details >></strong></p>
                <span class="read-more-btn">Read more about your profit</span>
            </div>
        </div>
        <div class="card" onclick="openModal('modal-google')">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/SEO.png" alt="Google Ads">
            <div class="card-content">
                <h3>Google Ads & SEO</h3>
                <p>Taking over search results exactly when the customer is looking for a solution. Purchase-intent based marketing and maximum accuracy.<br><strong>Click for more details >></strong></p>
                <span class="read-more-btn">Read more about your profit</span>
            </div>
        </div>
        <div class="card" onclick="openModal('modal-web')">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/תמונה-דף-נחיתה-לאתר-שלי-ריבועים-scaled.jpg" alt="Landing Pages">
            <div class="card-content">
                <h3>Landing Pages & Websites</h3>
                <p>A designed digital asset that works for you 24/7. Marketing funnels and pages that look like a million dollars but mainly - sell.<br><strong>Click for more details >></strong></p>
                <span class="read-more-btn">Read more about your profit</span>
            </div>
        </div>
        <div class="card" onclick="openModal('modal-auto')">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/תמונת-אוטמציה-לדף-נחיתה-scaled.jpg" alt="Automation">
            <div class="card-content">
                <h3>B2B Automations</h3>
                <p>The quiet engine that saves you manpower and prevents lead loss. Smart connection between systems to create a perfect service experience.<br><strong>Click for more details >></strong></p>
                <span class="read-more-btn">Read more about your profit</span>
            </div>
        </div>
    </div>
</section>

<div id="modal-social" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-social')">&times;</span><div class="modal-title">Social Media Management - Turning followers into clients</div><div class="modal-text"><p>Today's world is a world of communities and content. Social media management with us is not just "uploading a nice post", but building visibility that projects authority and professionalism. We create a smart content strategy that combines your business values with what your audience really wants to hear.</p><p>The process includes:</p><ul class="modal-list"><li>Cracking the brand's unique Tone of Voice.</li><li>Graphic design tailored to the psychology of scrolling (Stop Scroll).</li><li>Managing paid campaigns to precise audiences (Remarketing, Look-alike).</li><li>Responding to comments and creating live interaction.</li></ul><p><strong>Your Profit:</strong> You turn from "just another business" into a leading brand in your field. Your clients feel a sense of belonging, confidence in the brand increases, and when they are ready to buy - you are their first and natural choice.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 10px 30px;" onclick="closeModal('modal-social'); document.getElementById('contact').scrollIntoView();">I want a strong brand!</button></div></div></div></div>
<div id="modal-google" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-google')">&times;</span><div class="modal-title">Google Ads & SEO - Being there at the moment of truth</div><div class="modal-text"><p>Appearing on Google means being there exactly at the moment the client is looking for a solution to their problem. This is the most critical meeting point in marketing. We don't believe in pouring budget on general words, but work using the SKAGs (Single Keyword Ad Groups) method to ensure maximum relevance and a high Quality Score that lowers costs.</p><p>The process includes:</p><ul class="modal-list"><li>In-depth keyword research to locate "money on the floor".</li><li>Writing ads that hit the customer's exact pain point.</li><li>Daily optimization to improve conversion rates (CTR & CR).</li><li>Organic promotion (SEO) to build a long-term asset.</li></ul><p><strong>Your Profit:</strong> A steady stream of "hot" leads who have already made a decision to buy and are just looking for who to buy from. You stop chasing customers and start getting inquiries from people who need you right now.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 10px 30px;" onclick="closeModal('modal-google'); document.getElementById('contact').scrollIntoView();">Bring me hot leads!</button></div></div></div></div>
<div id="modal-web" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-web')">&times;</span><div class="modal-title">Landing Pages and Websites - Your sales machine</div><div class="modal-text"><p>Your website or landing page is the face of your business digitally. You have exactly 3 seconds to convince the surfer to stay. We build pages that not only look visually stunning but are psychologically structured to drive action.</p><p>The process includes:</p><ul class="modal-list"><li>User Experience (UX) characterization for a smooth purchasing path.</li><li>Marketing copywriting that speaks to benefits and not just features.</li><li>Perfect responsive design for all screen types.</li><li>Implementation of tracking tools (Pixel, Analytics) for precise monitoring.</li></ul><p><strong>Your Profit:</strong> A sales machine that works 24/7, even when you're sleeping. Our pages increase conversion rates, which means for every dollar you spend on advertising - you get more inquiries and sales.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 10px 30px;" onclick="closeModal('modal-web'); document.getElementById('contact').scrollIntoView();">Build me a digital asset!</button></div></div></div></div>
<div id="modal-auto" class="modal-overlay"><div class="modal-content"><span class="modal-close" onclick="closeModal('modal-auto')">&times;</span><div class="modal-title">B2B Automations - Peace of mind and efficiency</div><div class="modal-text"><p>In the business world, speed is the name of the game. Automation is the difference between a business drowning in tedious tasks and a business that grows. We build systems that talk to each other and replace Sisyphean work, so you can manage rather than operate.</p><p>The process includes:</p><ul class="modal-list"><li>Connecting landing pages to CRM systems.</li><li>Automated message series (Email & SMS) for warming up leads.</li><li>Sending quotes and follow-ups without human touch.</li><li>Real-time manager alerts on hot deals.</li></ul><p><strong>Your Profit:</strong> Insane efficiency. You save hours of secretarial work, prevent human errors, and ensure no lead "falls between the cracks". The customer receives a 'wow' service, and you get peace of mind.</p><div class="modal-cta"><button class="submit-btn" style="width: auto; padding: 10px 30px;" onclick="closeModal('modal-auto'); document.getElementById('contact').scrollIntoView();">I want an automated business!</button></div></div></div></div>

<section class="knowledge-section reveal" id="knowledge">
    <div class="k-header">
        <h2>Niro <span>Knowledge</span></h2>
        <p>Professional insights that will change how you think about marketing</p>
    </div>

    <div class="knowledge-grid">
        <div class="knowledge-card" id="k-topic-0">
            <div class="k-img-wrap">
                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=600&auto=format&fit=crop" alt="Psychology and Sales">
                <div class="k-tag">Psychology</div>
            </div>
            <div class="k-body">
                <span class="k-title">Psychology of Sales and Micro-copy</span>
                <span class="k-excerpt">Why do customers buy? It's not the product, it's the emotion.</span>
                <div class="k-content">
                    Most business owners sell "features" (what the product does). Great marketers sell "transformation" (who the customer will become). <br><br>
                    The key to high conversions on a site lies in <strong>micro-copy</strong>: the small words on buttons, error messages, and subheadings. Instead of writing "Click here", try "I want to start saving". This psychological shift moves the customer from a state of "performing a task" to a state of "receiving value". We specialize in building sales scripts that work on the customer's subconscious and neutralize objections even before they arise.
                </div>
            </div>
        </div>

        <div class="knowledge-card" id="k-topic-1">
            <div class="k-img-wrap">
                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=600&auto=format&fit=crop" alt="Remarketing">
                <div class="k-tag">Strategy</div>
            </div>
            <div class="k-body">
                <span class="k-title">The Invisible Funnel (Retargeting)</span>
                <span class="k-excerpt">How to close the customers who "almost" bought.</span>
                <div class="k-content">
                    Statistics say that 97% of your website visitors won't buy on the first visit. If you don't have a remarketing strategy, you're leaving money on the table.<br><br>
                    Our method builds an "invisible funnel": the customer enters the site, leaves, and then "accidentally" sees a video ad of yours on Facebook that provides value, followed by a recommendation from a customer on Instagram. We don't "chase" the customer with aggressive sales ads, but build an aura of a leading brand around them until they feel you are the only logical choice.
                </div>
            </div>
        </div>

        <div class="knowledge-card" id="k-topic-2">
            <div class="k-img-wrap">
                <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600&auto=format&fit=crop" alt="Automation">
                <div class="k-tag">Technology</div>
            </div>
            <div class="k-body">
                <span class="k-title">Automation as a Growth Engine (Not Just Savings)</span>
                <span class="k-excerpt">The secret weapon of big businesses.</span>
                <div class="k-content">
                    Most people think automation is only meant to save a secretary's time. That's true, but it's just the tip of the iceberg. Automation is a sales tool.<br><br>
                    Think about it: a lead leaves details at 11:00 PM. Instead of waiting for morning (when they've cooled down), they immediately receive a personal WhatsApp with an explanatory video and a link to schedule a meeting in the calendar. The system knows to identify if they opened the email, clicked on the link, and send them messages accordingly. It's like having a superstar salesperson who works 24/7 and doesn't ask for a raise.
                </div>
            </div>
        </div>

        <div class="knowledge-card" id="k-topic-3">
            <div class="k-img-wrap">
                <img src="https://images.unsplash.com/photo-1571786256017-aee7a0c009b6?q=80&w=600&auto=format&fit=crop" alt="SEO">
                <div class="k-tag">SEO & AI</div>
            </div>
            <div class="k-body">
                <span class="k-title">SEO in 2026: Beyond Keywords</span>
                <span class="k-excerpt">How to beat Google in the AI era?</span>
                <div class="k-content">
                    Once, SEO was about "stuffing keywords" into text. Today, Google and AI understand user intent. If your site doesn't answer the surfer's real question, no keyword will help.<br><br>
                    Our strategy focuses on E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness). We create "Content Clusters" that cover a topic from all angles and turn your site into an authority in the field. This doesn't just bring traffic, it brings traffic that converts into paying customers.
                </div>
            </div>
        </div>

        <div class="knowledge-card" id="k-topic-4">
            <div class="k-img-wrap">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop" alt="Data">
                <div class="k-tag">Analytics</div>
            </div>
            <div class="k-body">
                <span class="k-title">Data Doesn't Lie (Data Driven)</span>
                <span class="k-excerpt">Stop guessing and start measuring profits.</span>
                <div class="k-content">
                    Many business owners make decisions based on "gut feeling". In digital marketing, this is a recipe for disaster. We work according to cold metrics: ROAS (Return on Ad Spend), CAC (Customer Acquisition Cost), and LTV (Life Time Value).<br><br>
                    Our dashboards show you exactly how much money comes in for every dollar that went out. If a certain campaign brings cheap leads but doesn't close deals - we'll know it and stop it. If a certain ad brings customers who buy again and again - we'll put all the budget on it. That's the difference between gambling and investing.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-section reveal" id="faq-section">
    <div class="faq-container">
        <h2 style="text-align:center; margin-bottom:50px; font-size:42px; font-weight:900;">Important Questions</h2>

        <div class="faq-item">
            <div class="faq-question">Why do I need automation in my business? <span>+</span></div>
            <div class="faq-answer">Because time is your most precious resource. Automation ensures that the lead receives an immediate response, that meetings are scheduled in the calendar automatically, and that your clients feel they are in good hands even when you sleep.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is organic or paid promotion better? <span>+</span></div>
            <div class="faq-answer">The combination is the winner. Paid brings "oxygen" (leads) here and now, and organic builds authority and trust for the long term. We build a strategy that combines both for maximum ROI.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What is a "Quality Score" in Google? <span>+</span></div>
            <div class="faq-answer">Google rewards relevant advertisers. If your ad and website are precise to the surfer's search, Google will display you higher and charge less money for each click. This is our expertise – precision.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Do I need a huge budget to start? <span>+</span></div>
            <div class="faq-answer">Absolutely not. The trick is to start accurately. Even with a small budget, using my working method (SKAGs), we reach precise results and a positive return on investment before thinking about scaling up.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">How much time do I need to invest in campaign management? <span>+</span></div>
            <div class="faq-answer">Almost zero. That's the beauty of automation and my management. You receive transparent reports and see results, while you are free to manage the business and not the marketing. Your peace of mind is my goal.</div>
        </div>
    </div>
</section>

<section class="testimonials reveal" id="testimonials">
    <h2 style="font-size:48px; margin-bottom:80px; font-weight:900;">What do the clients say?</h2>
    <div class="t-grid">
        <div class="t-card">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/לוגו-עסק.jpg" class="t-logo">
            <div class="t-stars">⭐⭐⭐⭐⭐</div>
            <span class="t-name">Tal Holistic</span>
            <span class="t-role">A true success story</span>
            <p>"Working with Nir changed my business. The automation system Niro built for me makes the leads sort themselves out, and it's simply like magic."</p>
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
            <span class="t-name">Nicole – My tropical house</span>
            <span class="t-role">Bridal preparation house</span>
            <p>"Nir's service feels personal, not 'just another client'. He built me a plan that doubled the revenues within three months."</p>
        </div>
        <div class="t-card">
            <img src="https://www.nirodigital.co.il/wp-content/uploads/2026/01/life-stayle-logo-scaled.jpg" class="t-logo">
            <div class="t-stars">⭐⭐⭐⭐⭐</div>
            <span class="t-name">Daniela – Online Store</span>
            <span class="t-role">Lifestyle products</span>
            <p>"With Nir, I felt I had a real partner for growth. He didn't just market my business - he built a warm and loyal community around it. Highly recommended."</p>
        </div>
    </div>
</section>

<section class="contact reveal" id="contact">
    <div class="contact-box">
        <h2>Let's talk business</h2>
        <form onsubmit="return handleFormSubmit(event)">
            <div class="form-group"><input type="text" name="client_name" placeholder="Full Name" required></div>
            <div class="form-group"><input type="tel" name="client_phone" placeholder="Phone Number" required></div>
            <div class="form-group"><input type="email" name="client_email" placeholder="Email Address" required></div>
            <div class="form-group"><textarea name="client_message" rows="4" placeholder="How can I help you?"></textarea></div>
            <button type="submit" class="submit-btn">Send Details</button>
        </form>
    </div>
</section>

<footer>
    <div>
        <img src="https://www.nirodigital.co.il/wp-content/uploads/2025/09/cropped-לוגו-סמיילי-חדש-1.png" style="height: 50px; margin-bottom: 20px;"><br>
        2026 © NIRO Digital Marketing | Advanced Marketing & Automation Solutions<br>
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

    function scrollToTopic(index) {
        const section = document.getElementById('knowledge');
        const card = document.getElementById('k-topic-' + index);
        section.scrollIntoView({ behavior: 'smooth' });
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
</script>

</body>
</html>
