# NusaTech Care - Professional Landing Page

## Spesifikasi Stack
* PHP Native 8.0+
* HTML5 Semantic
* CSS3 Custom (Variables, Flex/Grid, Mobile-First)
* Vanilla JavaScript ES6
* Tanpa Database (Lead disimpan di `storage/leads.csv`)
* Responsif semua ukuran layar.

## Cara Install & Menjalankan (XAMPP / cPanel)

### 1. Struktur Folder
Pastikan file di-*extract* di root domain lu (misal `public_html/`) atau di `htdocs/nusatech-care/` kalau di XAMPP.
Tidak perlu edit struktur. File utama adalah `index.php`.

### 2. Konfigurasi
Buka file `config.php`. Edit variabel ini sesuai kebutuhan lu:
* `$config['whatsapp']` -> Ganti dengan nomor lu tanpa `+` atau spasi. Awali dengan `62`.
* `$config['email']` -> Email usaha.
* Harga, list layanan, testimoni bisa langsung diedit di *array* di dalam `config.php`. HTML akan menyesuaikan otomatis.

### 3. Folder Storage (PENTING)
Agar form berfungsi dan file `.csv` bisa dibuat:
* Pada cPanel, pastikan folder `storage/` memiliki permission **0755** atau **0777** (writeable).
* Data orang yang isi form akan masuk ke `storage/leads.csv`. 
* File csv ini sudah diproteksi oleh `.htaccess` agar tidak bisa didownload oleh public.

### 4. Menjalankan di PHP Built-in Server (Untuk Testing Lokal)
Jika tidak pakai XAMPP, buka terminal di folder project, jalankan:
```bash
php -S localhost:8000

## Catatan Harga Paket

Range harga di landing page sudah disamakan dengan logika kalkulator internal:

- Cek Awal: Rp30K
- Service Software: Rp150K - Rp250K
- Service Lengkap: sesuai diagnosa / kalkulator final

Harga final tetap mengikuti hasil diagnosa, sparepart, risiko, urgent, garansi, dan persetujuan client.
