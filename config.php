<?php
// config.php
$config = [
    'brand_name' => 'NusaTech Care',
    'tagline' => 'Service Perangkat Lebih Jelas, Rapi, dan Nggak Bikin Nebak-Nebak.',
    'description' => 'Service laptop, PC, dan Android di Jambi dengan fokus pada diagnosa jelas, estimasi rapi, pengerjaan profesional, serta prioritas pada keamanan data.',
    'whatsapp' => '6281252580812',
    'email' => 'support@nusatechcare.id',
    'location' => 'Jambi City, Jambi, Indonesia',
    'business_hours' => 'Senin - Sabtu · 09:00 - 20:00 WIB',
];

$hero_stats = [
    ['value' => '30+', 'label' => 'Jenis Kendala'],
    ['value' => '3', 'label' => 'Jam Maksimal Diagnosa Awal'],
    ['value' => '100%', 'label' => 'Transparan'],
];

$services = [
    ['icon' => 'laptop', 'category' => 'Hardware & System', 'title' => 'Service Laptop & PC', 'desc' => 'Perbaikan laptop dan PC untuk kendala mati total, layar, keyboard, charging, motherboard, sampai performa menurun.', 'benefits' => ['Diagnosa terukur', 'Komunikasi jelas', 'Pengerjaan rapi']],
    ['icon' => 'smartphone', 'category' => 'Android Repair', 'title' => 'Service Android', 'desc' => 'Penanganan bootloop, ganti part dasar, konektor charger, masalah sistem, dan keluhan Android harian lainnya.', 'benefits' => ['Aman untuk data', 'Estimasi transparan', 'Respons cepat']],
    ['icon' => 'disc', 'category' => 'Software Setup', 'title' => 'Install Ulang OS', 'desc' => 'Install Windows atau OS lain dengan driver, update, dan optimasi seperlunya agar perangkat enak dipakai lagi.', 'benefits' => ['Sistem bersih', 'Driver rapi', 'Setup dasar lengkap']],
    ['icon' => 'database', 'category' => 'Data Care', 'title' => 'Backup & Recovery', 'desc' => 'Backup data penting atau usaha recovery saat storage mulai bermasalah, terformat, atau sistem tidak bisa masuk.', 'benefits' => ['Prioritas privasi', 'Analisa storage', 'Opsi penyelamatan data']],
    ['icon' => 'cpu', 'category' => 'Upgrade', 'title' => 'Upgrade SSD/RAM', 'desc' => 'Upgrade komponen untuk mempercepat booting, multitasking, dan kenyamanan pemakaian tanpa harus beli perangkat baru.', 'benefits' => ['Performa naik terasa', 'Saran part sesuai budget', 'Testing setelah upgrade']],
    ['icon' => 'wind', 'category' => 'Maintenance', 'title' => 'Cleaning & Thermal', 'desc' => 'Pembersihan debu menyeluruh dan penggantian thermal paste agar suhu perangkat lebih stabil dan usia pakai lebih panjang.', 'benefits' => ['Overheat berkurang', 'Mesin lebih adem', 'Interior lebih bersih']],
];

$steps = [
    ['title' => 'Ceritakan Kendala', 'desc' => 'Kamu jelaskan gejala perangkat lewat chat atau saat drop unit.'],
    ['title' => 'Cek & Diagnosa', 'desc' => 'Perangkat diperiksa untuk mencari sumber masalah yang paling masuk akal.'],
    ['title' => 'Estimasi Biaya', 'desc' => 'Setelah jelas, kamu dapat estimasi dan opsi tindakan sebelum lanjut.'],
    ['title' => 'Pengerjaan', 'desc' => 'Service dilakukan sesuai persetujuan dengan fokus pada kerapian dan keamanan.'],
    ['title' => 'Testing Akhir', 'desc' => 'Semua fungsi utama dicek lagi agar hasilnya bukan sekadar “nyala doang”.'],
    ['title' => 'Serah Terima', 'desc' => 'Perangkat dikembalikan lengkap dengan update hasil dan saran perawatan.'],
];

$advantages = [
    ['title' => 'Diagnosa Nggak Asal Tebak', 'desc' => 'Kerusakan dicari dengan pendekatan yang jelas, bukan sekadar nebak-nebak sumber masalah.'],
    ['title' => 'Estimasi Lebih Transparan', 'desc' => 'Biaya dan tindakan dijelaskan dulu sebelum pengerjaan besar dilakukan.'],
    ['title' => 'Data Diprioritaskan', 'desc' => 'Backup dan keamanan data diperhatikan supaya kamu nggak was-was.'],
    ['title' => 'Komunikasi Santai Tapi Tegas', 'desc' => 'Kamu tetap bisa tanya detail tanpa dibikin bingung sama istilah teknis.'],
    ['title' => 'Pengerjaan Lebih Rapi', 'desc' => 'Bukan cuma selesai, tapi dibikin rapi dan layak dipakai harian lagi.'],
    ['title' => 'Cocok Buat Anak Muda & Profesional', 'desc' => 'Solusinya relevan buat pelajar, mahasiswa, pekerja, dan pengguna aktif.'],
];

$packages = [
    ['name' => 'Cek Awal', 'price' => 'Rp30K', 'desc' => 'Cocok untuk diagnosa awal dan gambaran tindakan yang paling masuk akal.', 'features' => ['Pengecekan awal perangkat', 'Estimasi tindakan', 'Saran penanganan berikutnya'], 'popular' => false],
    ['name' => 'Service Software', 'price' => 'Mulai Rp100K', 'desc' => 'Untuk install ulang, optimasi software, driver, atau perbaikan sistem yang lebih sering diminta.', 'features' => ['Install/repair OS', 'Optimasi ringan', 'Testing dasar setelah pengerjaan', 'Paling sering dipilih client'], 'popular' => true],
    ['name' => 'Service Lengkap', 'price' => 'Sesuai Diagnosa', 'desc' => 'Untuk kasus hardware, recovery data, cleaning, upgrade, atau perbaikan yang butuh tindakan lebih dalam.', 'features' => ['Estimasi sesuai hasil cek', 'Part dihitung terpisah bila perlu', 'Testing & QC akhir', 'Catatan pengerjaan lebih jelas'], 'popular' => false],
];

$testimonials = [
    ['text' => 'Laptop saya awalnya lemot banget. Setelah dicek, dijelasin penyebabnya dan opsi paling worth it. Akhirnya upgrade SSD dan hasilnya jauh lebih enak dipakai.', 'name' => 'Budi Saputra', 'device' => 'Laptop ASUS'],
    ['text' => 'Android bootloop saya ternyata masih bisa diselamatkan tanpa tindakan yang aneh-aneh. Komunikasinya enak, jelas, dan datanya juga aman.', 'name' => 'Dinda Rahma', 'device' => 'Android Xiaomi'],
    ['text' => 'PC saya dibersihin dan repaste thermal, sekarang suhu lebih stabil dan suara kipas nggak segila sebelumnya. Pengerjaannya rapi banget.', 'name' => 'Andi Tama', 'device' => 'PC Rakitan'],
];

$faqs = [
    ['q' => 'Apakah bisa konsultasi dulu sebelum service?', 'a' => 'Bisa. Kamu boleh chat dulu buat jelasin kendala dan nanya estimasi awal tanpa harus langsung eksekusi.'],
    ['q' => 'Biasanya berapa lama diagnosa?', 'a' => 'Diagnosa awal umumnya 1–3 jam tergantung antrian dan tingkat kendala. Kasus berat tentu bisa lebih lama.'],
    ['q' => 'Apakah data saya aman?', 'a' => 'Keamanan data diprioritaskan. Kalau ada tindakan yang berisiko ke data, akan dikonfirmasi dulu sebelum lanjut.'],
    ['q' => 'Apakah bisa install ulang dan sekalian backup?', 'a' => 'Bisa. Kamu tinggal info kebutuhan backup atau recovery-nya sejak awal supaya alurnya disiapkan dengan benar.'],
    ['q' => 'Kalau butuh upgrade SSD atau RAM, apakah bisa dibantu pilih part?', 'a' => 'Bisa. NusaTech Care bisa bantu kasih saran part yang cocok sesuai device dan budget kamu.'],
    ['q' => 'Apakah ada garansi pengerjaan?', 'a' => 'Ada untuk jenis pengerjaan tertentu. Detail garansi mengikuti jenis service dan komponen yang ditangani.'],
];

function getIcon($name) {
    $icons = [
        'laptop' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="12" rx="2"></rect><path d="M2 20h20"></path></svg>',
        'smartphone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="2" width="10" height="20" rx="2"></rect><path d="M11.5 18h1"></path></svg>',
        'disc' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="12" r="2"></circle><path d="m12 3 4.5 7.5"></path></svg>',
        'database' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="8" ry="3"></ellipse><path d="M4 5v14c0 1.7 3.6 3 8 3s8-1.3 8-3V5"></path><path d="M4 12c0 1.7 3.6 3 8 3s8-1.3 8-3"></path></svg>',
        'cpu' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="2"></rect><rect x="10" y="10" width="4" height="4"></rect><path d="M4 10h3M4 14h3M17 10h3M17 14h3M10 4v3M14 4v3M10 17v3M14 17v3"></path></svg>',
        'wind' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8h10a2 2 0 1 0-2-2"></path><path d="M3 16h14a2 2 0 1 1-2 2"></path><path d="M3 12h18"></path></svg>',
    ];
    return $icons[$name] ?? '';
}
?>
