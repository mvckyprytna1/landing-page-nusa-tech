<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
require_once 'config.php';

function initials($name) {
    $parts = preg_split('/\s+/', trim($name));
    $letters = '';
    foreach ($parts as $part) {
        if ($part !== '') {
            $letters .= strtoupper(substr($part, 0, 1));
        }
        if (strlen($letters) >= 2) break;
    }
    return $letters ?: 'NC';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($config['brand_name']) ?> | <?= htmlspecialchars($config['tagline']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($config['description']) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($config['brand_name']) ?> | <?= htmlspecialchars($config['tagline']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($config['description']) ?>">
    <meta name="theme-color" content="#0a0e1a">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 100 100%27%3E%3Ctext y=%27.9em%27 font-size=%2790%27%3E%F0%9F%94%A7%3C/text%3E%3C/svg%3E">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- ========================= NAVBAR ========================= -->
    <nav class="navbar" id="navbar">
        <div class="container nav-wrap">
            <a href="#home" class="brand">
                <span class="brand-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.7 6.3a2 2 0 0 0-2.8 0L4.8 13.4a2 2 0 0 0 0 2.8l3 3a2 2 0 0 0 2.8 0l7.1-7.1a2 2 0 0 0 0-2.8l-3-3Z"></path>
                        <path d="m16 8 3-3"></path>
                        <path d="m2 22 6-6"></path>
                    </svg>
                </span>
                <span class="brand-text">
                    <strong><?= htmlspecialchars($config['brand_name']) ?></strong>
                    <small>Jambi Tech Repair</small>
                </span>
            </a>

            <div class="nav-menu" id="nav-menu">
                <a href="#home" class="nav-link">Home</a>
                <a href="#layanan" class="nav-link">Layanan</a>
                <a href="#alur" class="nav-link">Alur</a>
                <a href="#harga" class="nav-link">Harga</a>
                <a href="#faq" class="nav-link">FAQ</a>
                <a href="https://wa.me/<?= htmlspecialchars($config['whatsapp']) ?>" class="btn btn-primary btn-nav nav-mobile-cta" target="_blank" rel="noopener">
                    <span class="btn-icon">💬</span>
                    Chat WhatsApp
                </a>
            </div>

            <div class="nav-cta">
                <a href="https://wa.me/<?= htmlspecialchars($config['whatsapp']) ?>" class="btn btn-primary btn-nav nav-desktop-cta" target="_blank" rel="noopener">
                    <span class="btn-icon">💬</span>
                    Chat WhatsApp
                </a>
                <button class="hamburger" id="hamburger" aria-label="Buka menu navigasi" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <main>
        <!-- ========================= HERO ========================= -->
        <section class="hero section-dots" id="home">
            <div class="hero-orb hero-orb-one"></div>
            <div class="hero-orb hero-orb-two"></div>
            <div class="container hero-grid">
                <div class="hero-copy reveal">
                    <div class="hero-chip">
                        <span class="chip-dot"></span>
                        Estimasi Jelas · Respons Cepat · Data Diprioritaskan
                    </div>
                    <h1>
                        Service perangkat <span class="headline-gradient">lebih jelas, rapi,</span> dan nggak bikin nebak-nebak.
                    </h1>
                    <p class="hero-text">
                        <?= htmlspecialchars($config['description']) ?> Cocok untuk laptop, PC, dan Android dengan pendekatan diagnosa yang transparan, modern, dan bisa dipercaya.
                    </p>
                    <div class="hero-actions">
                        <a href="#kontak" class="btn btn-primary btn-lg shimmer">Konsultasi Sekarang</a>
                        <a href="#layanan" class="btn btn-outline btn-lg">Lihat Layanan</a>
                    </div>

                    <div class="hero-stats" id="hero-stats">
                        <?php foreach($hero_stats as $stat): ?>
                            <?php
                                preg_match('/\d+/', $stat['value'], $match);
                                $num = $match[0] ?? 0;
                                $suffix = trim(str_replace((string)$num, '', $stat['value']));
                            ?>
                            <div class="stat-card">
                                <div class="stat-value">
                                    <span class="counter" data-target="<?= htmlspecialchars($num) ?>">0</span><span><?= htmlspecialchars($suffix) ?></span>
                                </div>
                                <p><?= htmlspecialchars($stat['label']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="hero-visual reveal delay-1">
                    <div class="terminal-card">
                        <div class="terminal-topbar">
                            <div class="terminal-lights">
                                <span></span><span></span><span></span>
                            </div>
                            <p>Live Diagnostic Console</p>
                        </div>
                        <div class="terminal-screen">
                            <div class="terminal-line"><span class="terminal-prompt">&gt;</span> System Diagnostics</div>
                            <div class="terminal-line"><span class="terminal-prompt">&gt;</span> Storage: <strong class="text-warn">Warning</strong></div>
                            <div class="terminal-line"><span class="terminal-prompt">&gt;</span> Thermal: <strong class="text-danger">Critical</strong></div>
                            <div class="terminal-line"><span class="terminal-prompt">&gt;</span> Memory: <strong class="text-ok">Optimal</strong></div>
                            <div class="terminal-line typing-line"><span class="terminal-prompt">&gt;</span> <span id="terminal-typing">Repair Recommended</span><span class="cursor"></span></div>
                        </div>
                        <div class="diagnostic-panel">
                            <div class="diag-item">
                                <span>Storage Health</span>
                                <div class="diag-bar"><div class="diag-fill fill-warning"></div></div>
                            </div>
                            <div class="diag-item">
                                <span>Cooling System</span>
                                <div class="diag-bar"><div class="diag-fill fill-danger"></div></div>
                            </div>
                            <div class="diag-item">
                                <span>Memory Stability</span>
                                <div class="diag-bar"><div class="diag-fill fill-ok"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================= SERVICES ========================= -->
        <section class="section" id="layanan">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">LAYANAN UTAMA</span>
                    <h2>Solusi service yang lengkap, rapi, dan masuk akal.</h2>
                    <p>Mulai dari kendala software ringan sampai perbaikan hardware, semuanya dikerjakan dengan alur yang jelas dan komunikatif.</p>
                </div>

                <div class="services-grid">
                    <?php foreach($services as $index => $srv): ?>
                        <article class="service-card reveal delay-<?= ($index % 3) ?>">
                            <div class="service-icon"><?= getIcon($srv['icon']) ?></div>
                            <span class="service-badge"><?= htmlspecialchars($srv['category']) ?></span>
                            <h3><?= htmlspecialchars($srv['title']) ?></h3>
                            <p><?= htmlspecialchars($srv['desc']) ?></p>
                            <ul class="service-list">
                                <?php foreach($srv['benefits'] as $benefit): ?>
                                    <li><?= htmlspecialchars($benefit) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= FLOW ========================= -->
        <section class="section flow-section" id="alur">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">ALUR KERJA</span>
                    <h2>Dibikin rapi dari awal masuk sampai perangkat siap dipakai lagi.</h2>
                    <p>Nggak ada langkah yang samar. Lu bisa tahu prosesnya, estimasinya, dan keputusan eksekusinya.</p>
                </div>

                <div class="timeline reveal">
                    <?php foreach($steps as $i => $step): ?>
                        <div class="timeline-step">
                            <div class="timeline-number"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
                            <h3><?= htmlspecialchars($step['title']) ?></h3>
                            <p><?= htmlspecialchars($step['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= BEFORE AFTER ========================= -->
        <section class="section" id="before-after">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">SEBELUM VS SESUDAH</span>
                    <h2>Perbedaannya kerasa, bukan sekadar janji.</h2>
                    <p>Ini gambaran umum kenapa banyak perangkat terasa bikin stres sebelum ditangani dengan diagnosa yang bener.</p>
                </div>

                <div class="compare-grid reveal">
                    <article class="compare-card compare-before">
                        <div class="compare-title-wrap">
                            <span class="compare-icon">✕</span>
                            <h3>Before</h3>
                        </div>
                        <ul>
                            <li>Laptop lemot, panas, atau sering hang tiba-tiba.</li>
                            <li>Status kerusakan nggak jelas dan biaya bikin ragu.</li>
                            <li>Takut data hilang saat install ulang atau perbaikan.</li>
                            <li>Masalah kecil dibiarkan sampai makin parah.</li>
                            <li>Perangkat terasa nggak nyaman dipakai kerja atau kuliah.</li>
                        </ul>
                    </article>
                    <article class="compare-card compare-after">
                        <div class="compare-title-wrap">
                            <span class="compare-icon">✓</span>
                            <h3>After</h3>
                        </div>
                        <ul>
                            <li>Perangkat lebih stabil, adem, dan siap dipakai harian.</li>
                            <li>Diagnosa dan estimasi biaya dijelaskan dengan transparan.</li>
                            <li>Data diprioritaskan sebelum tindakan yang berisiko.</li>
                            <li>Upgrade dan perbaikan terasa nyata manfaatnya.</li>
                            <li>Lu lebih paham kondisi perangkat dan langkah perawatannya.</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <!-- ========================= ADVANTAGES ========================= -->
        <section class="section highlight-section" id="keunggulan">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">KENAPA NUSATECH CARE</span>
                    <h2>Keunggulan yang bikin service terasa lebih aman dan nyaman.</h2>
                    <p>Target kami bukan cuma memperbaiki perangkat, tapi bikin prosesnya terasa jelas dan nggak bikin was-was.</p>
                </div>

                <div class="advantages-grid">
                    <?php foreach($advantages as $index => $adv): ?>
                        <article class="advantage-card reveal delay-<?= ($index % 3) ?>">
                            <div class="advantage-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            </div>
                            <h3><?= htmlspecialchars($adv['title']) ?></h3>
                            <p><?= htmlspecialchars($adv['desc']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= PRICING ========================= -->
        <section class="section" id="harga">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">PAKET HARGA</span>
                    <h2>Pilihan paket yang fleksibel sesuai kebutuhan service.</h2>
                    <p>Harga akhir tetap menyesuaikan hasil diagnosa. Tapi lu tetap dapat gambaran awal yang jelas sebelum lanjut.</p>
                </div>

                <div class="pricing-grid">
                    <?php foreach($packages as $pkg): ?>
                        <article class="price-card <?= $pkg['popular'] ? 'featured' : '' ?> reveal">
                            <?php if ($pkg['popular']): ?>
                                <div class="featured-badge">Paling Sering Diminta</div>
                            <?php endif; ?>
                            <h3><?= htmlspecialchars($pkg['name']) ?></h3>
                            <div class="price-value"><?= htmlspecialchars($pkg['price']) ?></div>
                            <p class="price-text"><?= htmlspecialchars($pkg['desc']) ?></p>
                            <ul class="price-list">
                                <?php foreach($pkg['features'] as $feature): ?>
                                    <li><?= htmlspecialchars($feature) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="#kontak" class="btn <?= $pkg['popular'] ? 'btn-primary' : 'btn-outline' ?> btn-full">Pilih Paket Ini</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= TESTIMONIALS ========================= -->
        <section class="section testimonials-section" id="testimoni">
            <div class="container">
                <div class="section-head reveal">
                    <span class="eyebrow">TESTIMONI</span>
                    <h2>Yang penting bukan kata kami, tapi pengalaman client.</h2>
                    <p>Beberapa cerita singkat dari perangkat yang awalnya bermasalah, lalu balik enak dipakai lagi.</p>
                </div>

                <div class="testimonial-grid">
                    <?php foreach($testimonials as $t): ?>
                        <article class="testimonial-card reveal">
                            <div class="testimonial-top">
                                <div class="avatar"><?= htmlspecialchars(initials($t['name'])) ?></div>
                                <div>
                                    <h3><?= htmlspecialchars($t['name']) ?></h3>
                                    <span><?= htmlspecialchars($t['device']) ?></span>
                                </div>
                            </div>
                            <div class="stars">★★★★★</div>
                            <p>“<?= htmlspecialchars($t['text']) ?>”</p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= FAQ ========================= -->
        <section class="section" id="faq">
            <div class="container faq-shell">
                <div class="section-head reveal">
                    <span class="eyebrow">FAQ</span>
                    <h2>Pertanyaan yang paling sering ditanyain sebelum service.</h2>
                    <p>Kalau masih ada yang belum jelas, tinggal lanjut chat aja lewat WhatsApp.</p>
                </div>

                <div class="faq-list reveal">
                    <?php foreach($faqs as $faq): ?>
                        <article class="faq-item">
                            <button type="button" class="faq-question" aria-expanded="false">
                                <span><?= htmlspecialchars($faq['q']) ?></span>
                                <span class="faq-symbol">+</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <p><?= htmlspecialchars($faq['a']) ?></p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ========================= CONTACT ========================= -->
        <section class="section contact-section" id="kontak">
            <div class="container">
                <div class="contact-layout reveal">
                    <div class="contact-copy">
                        <span class="eyebrow">KONTAK & CTA</span>
                        <h2>Perangkat Bermasalah? Jangan Ditebak-Tebak.</h2>
                        <p>Isi form singkat di bawah. Setelah dikirim, kamu langsung diarahkan ke WhatsApp dengan format pesan yang rapi.</p>

                        <div class="contact-info-list">
                            <div class="contact-info-item">
                                <strong>WhatsApp</strong>
                                <span>+<?= htmlspecialchars($config['whatsapp']) ?></span>
                            </div>
                            <div class="contact-info-item">
                                <strong>Jam Operasional</strong>
                                <span><?= htmlspecialchars($config['business_hours']) ?></span>
                            </div>
                            <div class="contact-info-item">
                                <strong>Lokasi</strong>
                                <span><?= htmlspecialchars($config['location']) ?></span>
                            </div>
                        </div>

                        <div class="map-card">
                            <iframe title="Lokasi NusaTech Care" src="https://www.google.com/maps?q=Jambi%20City,%20Jambi,%20Indonesia&z=13&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="contact-form-card">
                        <form id="consultForm" action="submit.php" method="POST">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Contoh: Vicky" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">WhatsApp</label>
                                <input type="tel" id="phone" name="phone" placeholder="Contoh: 0812xxxx" maxlength="20" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="device">Jenis Perangkat</label>
                                    <select id="device" name="device" required>
                                        <option value="" selected disabled>Pilih perangkat</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="PC">PC</option>
                                        <option value="Android">Android</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="service">Jenis Layanan</label>
                                    <select id="service" name="service" required>
                                        <option value="" selected disabled>Pilih layanan</option>
                                        <option value="Service Laptop & PC">Service Laptop & PC</option>
                                        <option value="Service Android">Service Android</option>
                                        <option value="Install Ulang OS">Install Ulang OS</option>
                                        <option value="Backup & Recovery">Backup & Recovery</option>
                                        <option value="Upgrade SSD/RAM">Upgrade SSD/RAM</option>
                                        <option value="Cleaning & Thermal">Cleaning & Thermal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="issue">Detail Keluhan</label>
                                <textarea id="issue" name="issue" rows="5" maxlength="500" placeholder="Jelaskan kendalanya, misalnya: laptop cepat panas, lemot, atau Android bootloop..." required></textarea>
                            </div>
                            <div id="form-alert" class="form-alert hidden"></div>
                            <button type="submit" class="btn btn-primary btn-full btn-submit shimmer" id="btnSubmit">Kirim & Chat WhatsApp</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ========================= FOOTER ========================= -->
    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <div class="footer-brand">
                    <span class="brand-icon small">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a2 2 0 0 0-2.8 0L4.8 13.4a2 2 0 0 0 0 2.8l3 3a2 2 0 0 0 2.8 0l7.1-7.1a2 2 0 0 0 0-2.8l-3-3Z"></path>
                            <path d="m16 8 3-3"></path>
                        </svg>
                    </span>
                    <div>
                        <h3><?= htmlspecialchars($config['brand_name']) ?></h3>
                        <p><?= htmlspecialchars($config['tagline']) ?></p>
                    </div>
                </div>
            </div>
            <div>
                <h4>Navigasi Cepat</h4>
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#alur">Alur</a></li>
                    <li><a href="#harga">Harga</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4>Kontak</h4>
                <ul class="footer-links">
                    <li><a href="https://wa.me/<?= htmlspecialchars($config['whatsapp']) ?>" target="_blank" rel="noopener">+<?= htmlspecialchars($config['whatsapp']) ?></a></li>
                    <li><a href="mailto:<?= htmlspecialchars($config['email']) ?>"><?= htmlspecialchars($config['email']) ?></a></li>
                    <li><?= htmlspecialchars($config['location']) ?></li>
                    <li class="social-row">
                        <a href="#" aria-label="Instagram">◎</a>
                        <a href="#" aria-label="Facebook">◉</a>
                        <a href="#" aria-label="TikTok">◌</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>© 2026 <?= htmlspecialchars($config['brand_name']) ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/<?= htmlspecialchars($config['whatsapp']) ?>" class="floating-wa" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
        <span>WA</span>
    </a>

    <script>
        window.NTC_WA = "<?= htmlspecialchars($config['whatsapp']) ?>";
    </script>
    <script src="assets/js/app.js"></script>
</body>
</html>
