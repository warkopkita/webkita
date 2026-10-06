# 🛠️ Panduan Teknis & Arsitektur Developer — Webkita Studio

Dokumen ini merangkum arsitektur teknis, konvensi kode, alur transaksi, konfigurasi server, dan panduan operasional platform **Webkita**.

---

## 1. Ikhtisar Stack Teknologi

| Komponen | Spesifikasi & Versi |
|---|---|
| **Framework Backend** | Laravel 11.x (PHP 8.3+) |
| **Frontend Rendering** | Blade Templates + Alpine.js v3 |
| **CSS & Design System** | Tailwind CSS v4 via Vite 8.x Bundler |
| **Database Produksi** | MySQL 8.x (Dev/Testing: SQLite with In-Memory testing) |
| **Payment Gateway** | Midtrans Snap API (QRIS, BCA/Mandiri VA, GoPay) + Fallback Simulasi Instan |
| **Email Transaksional** | Laravel Mail (Mailable Classes) + Queue worker |
| **Web Server Target** | Nginx dengan HTTP/2, Let's Encrypt SSL, dan Gzip Compression |
| **Queue & Worker** | Supervisord + `php artisan queue:work` |
| **CI/CD** | GitHub Actions Workflow (`.github/workflows/deploy.yml`) |

---

## 2. Identitas Desain & Aturan Visual Mutlak

* **Palet Warna Studio**:
  * **Studio Deep Purple**: `#381867` (Background Utama), `#270D52` (Background Kartu), `#1A0630` (Input/Container).
  * **Electric Lime**: `#C8F169` (Aksen Utama, CTA, Badge Sorotan, Angka Monospace).
* **Frame Corner Brackets**:
  * Menggunakan kelas `.frame-corner`, `.frame-corner-tl`, `.frame-corner-tr`, `.frame-corner-bl`, `.frame-corner-br`.
* **Aturan Mutlak UI/UX: "JANGAN PAKAI IKON"**:
  * **DILARANG** menggunakan ikon SVG arbitrer, ikon grafis, maupun emoji di seluruh template.
  * Gunakan **penomoran monospace** (`01`, `02`, `03`), badge teks monospaced (`[WA]`, `[G]`, `[SECURE]`), panah tipografi ASCII (`&rarr;`, `&larr;`), dan titik geometris CSS (`w-2 h-2 rounded-full bg-[#C8F169]`).

---

## 3. Struktur Direktori Utama

```
webkita/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php         # Dashboard admin, order status, CRM lead, CMS blog & legal
│   │   │   ├── AuthController.php          # Login, register, Google OAuth redirect & callback
│   │   │   ├── BlogController.php          # Daftar artikel, pencarian, filter kategori, detail artikel
│   │   │   ├── CheckoutController.php      # Checkout form, order code generator, Snap token, payment simulation
│   │   │   ├── LeadController.php          # Tangkap prospek form brief kontak (dengan throttle limiter)
│   │   │   ├── LegalController.php         # Halaman kebijakan privasi (UU PDP) dan syarat ketentuan
│   │   │   ├── NewsletterController.php   # Tangkap subscriber email newsletter (dengan throttle limiter)
│   │   │   ├── PortalController.php        # Dashboard klien, upload brief, cetak invoice, notifikasi
│   │   │   ├── SeoController.php           # Dynamic XML Sitemap & Robots.txt
│   │   │   └── ServiceController.php       # Katalog 4 pilar layanan & detail spesifikasi
│   │   └── Middleware/
│   │       ├── EnsureUserIsAdmin.php       # Proteksi akses role 'admin'
│   │       └── SecurityHeaders.php         # Injeksi header keamanan HTTP (nosniff, SAMEORIGIN, CSP)
│   ├── Mail/
│   │   ├── OrderCreatedMail.php            # Email konfirmasi pemesanan paket
│   │   └── PaymentSuccessMail.php          # Email notifikasi pembayaran lunas & terverifikasi
│   ├── Models/                             # User, Service, Package, Order, Payment, ProjectBrief, Notification, etc.
│   └── Services/
│       └── PaymentService.php              # Midtrans Snap integration & fallback engine simulasi
├── database/
│   ├── migrations/                         # 13 file migrasi skema lengkap
│   └── seeders/DatabaseSeeder.php          # Akun admin default, layanan, paket harga, legal, artikel SEO
├── deploy/
│   ├── backup-db.sh                        # Script backup otomatis harian dengan rotasi 30 hari
│   ├── deploy.sh                           # Script deployment produksi zero-downtime
│   ├── nginx/webkita.conf                  # Virtual Host Nginx produksi lengkap dengan SSL & cache-busting
│   └── supervisor/webkita-worker.conf      # Konfigurasi worker queue persistensi Supervisor
├── resources/
│   ├── css/app.css                         # Tailwind CSS v4 tokens, utility classes & animations
│   ├── js/app.js                           # Alpine.js runtime & custom interactivity
│   └── views/                              # Template Blade terstruktur (admin, auth, blog, checkout, portal, services)
├── routes/
│   └── web.php                             # Seluruh route web dengan named routes & rate limiting
└── tests/
    └── Feature/WebkitaPlatformTest.php     # 14+ feature tests end-to-end
```

---

## 4. Alur Bisnis & Transaksi

### 4.1 Alur Pemesanan & Pembayaran (Checkout Flow)
1. Pengunjung memilih paket di halaman beranda atau `/layanan/{slug}`.
2. Pengunjung masuk ke rute `/checkout/{package:slug}`:
   * Mengisi nama, email, nomor WhatsApp, permintaan nama domain, dan kata sandi.
   * Jika belum login, akun klien dibuat otomatis di database dan langsung diautentikasi via `Auth::login()`.
3. Order dibuat dengan kode unik: `WK-YYYYMM-XXXX`.
4. Rute `/checkout/payment/{order:order_code}`:
   * Menghasilkan Midtrans Snap Token (atau Mock Token jika di lingkungan lokal).
   * Menampilkan panduan QRIS Instan dan Transfer Virtual Account (BCA/Mandiri/BRI).
   * Menyediakan tombol simulasi 1-klik untuk presentasi demo instan.
5. Pembayaran diverifikasi:
   * Status order berubah dari `unpaid` ke `paid`.
   * Record mutasi payment disimpan di tabel `payments`.
   * Notifikasi in-app dibuat otomatis untuk klien.
   * Email `PaymentSuccessMail` dikirimkan secara otomatis.
   * Klien diarahkan ke Portal Klien untuk melengkapi Brief Proyek.

### 4.2 Alur Portal Klien (Client Dashboard)
1. Klien mengakses `/portal/dashboard`.
2. Melacak tahapan milestone proyek (*01 Briefing*, *02 UI/UX*, *03 Development*, *04 Review*, *05 Go-Live*).
3. Mengunggah brief proyek (nama bisnis, deskripsi, link referensi, link Google Drive materi).
4. Melihat dan mencetak Invoice Resmi branded Webkita (`/portal/orders/{order}/invoice`).
5. Memantau pusat notifikasi in-app dan menandai telah dibaca.
6. Membagikan kode referral unik untuk program komisi Rp 100.000 per referral sukses.

### 4.3 Alur Panel Admin (Admin Dashboard)
1. Akun admin (`role = 'admin'`) mengakses `/admin/dashboard`.
2. Memantau 5 metrik analitik ringkas: Total Prospek, Pesanan Masuk, Estimasi Omset, Klien Terdaftar, dan Artikel Blog.
3. Memperbarui status pesanan secara instan via dropdown: `unpaid` &rarr; `paid` &rarr; `in_progress` &rarr; `review` &rarr; `completed`.
4. Menginspeksi brief materi klien via modal interaktif.
5. Mengirimkan notifikasi pembaruan proyek langsung ke klien.
6. Mengelola prospek leads (CRM mini) dengan klik langsung ke WhatsApp klien.
7. Mengekspor laporan riwayat transaksi ke format CSV streaming (`/admin/payments/export-csv`).
8. Melakukan CRUD artikel blog edukasi SEO dan mengedit dokumen legalitas (Kebijakan Privasi & Syarat Ketentuan).

---

## 5. Perintah Rutin Pengembangan & Testing

```powershell
# 1. Menjalankan Server Lokal
& "C:\php83\php.exe" artisan serve --port=8000

# 2. Kompilasi Aset Frontend (Tailwind + Vite)
npm.cmd run dev     # Untuk mode watch
npm.cmd run build   # Untuk kompilasi aset produksi

# 3. Menjalankan Pengujian Otomatis (PHPUnit)
& "C:\php83\php.exe" artisan test

# 4. Migrasi & Seeder Database
& "C:\php83\php.exe" artisan migrate:fresh --seed
```

---

## 6. Kredensial Akun Default

* **Akun Administrator**:
  * Email: `admin@webkita.id`
  * Password: `WebkitaAdmin2026!`
* **Akun Demo Klien**:
  * Email: `klien.google.demo@webkita.id` (atau login 1-klik via Google Auth).
