<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Package;
use App\Models\PageLegal;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@webkita.id'],
            [
                'name' => 'Administrator Webkita',
                'password' => Hash::make('WebkitaAdmin2026!'),
                'role' => 'admin',
                'whatsapp' => '081234567890',
            ]
        );

        // 2. Seed Services
        $serviceLanding = Service::updateOrCreate(
            ['slug' => 'landing-page'],
            [
                'name' => 'Landing Page Iklan',
                'tagline' => 'High-Converting Layout',
                'description' => 'Dirancang khusus untuk kampanye iklan Google Ads, TikTok Ads, dan Meta Ads. Fokus 100% mengonversi pengunjung menjadi pesan WhatsApp.',
                'badge_text' => '3 Hari Kerja',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        $serviceCompany = Service::updateOrCreate(
            ['slug' => 'company-profile'],
            [
                'name' => 'Company Profile',
                'tagline' => 'Kredibilitas Bisnis & Jasa',
                'description' => 'Membangun reputasi terpercaya untuk CV, PT, kantor konsultan, klinik, dan jasa profesional. Lengkap dengan portofolio dan legalitas.',
                'badge_text' => '5 Hari Kerja',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        $serviceStore = Service::updateOrCreate(
            ['slug' => 'toko-online'],
            [
                'name' => 'Toko Online Otomatis',
                'tagline' => 'E-Commerce Lengkap',
                'description' => 'Terima pesanan 24 jam nonstop dengan sistem pembayaran otomatis (QRIS instan, Transfer VA) dan cek ongkir ekspedisi se-Indonesia.',
                'badge_text' => '8 Hari Kerja',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        $serviceCustom = Service::updateOrCreate(
            ['slug' => 'custom-web-app'],
            [
                'name' => 'Custom Web App',
                'tagline' => 'Laravel 11 Architecture',
                'description' => 'Solusi sistem manajemen khusus seperti portal membership, booking janji klinik, sistem inventaris gudang, atau CRM bisnis kustom.',
                'badge_text' => 'Arsitektur Kustom',
                'sort_order' => 4,
                'is_active' => true,
            ]
        );

        // 3. Seed Packages
        Package::updateOrCreate(
            ['slug' => 'paket-kilat'],
            [
                'service_id' => $serviceLanding->id,
                'name' => 'Webkita Kilat',
                'tagline' => '1 Halaman Cepat & Berdaya Konversi Tinggi',
                'price' => 499000,
                'original_price' => 750000,
                'duration_days' => 3,
                'revision_count' => 2,
                'is_popular' => false,
                'sort_order' => 1,
                'is_active' => true,
                'cta_text' => 'Pesan Paket Kilat',
                'features' => [
                    '1 Halaman High-Converting Design',
                    'Pengerjaan Cepat (3-4 Hari Kerja)',
                    '100% Responsif Smartphone & Desktop',
                    'Integrasi Tombol WhatsApp Direct',
                    'Domain & Cloud Hosting 1 Tahun',
                    'Garansi Perbaikan 14 Hari',
                ],
            ]
        );

        Package::updateOrCreate(
            ['slug' => 'paket-bisnis'],
            [
                'service_id' => $serviceCompany->id,
                'name' => 'Webkita Bisnis',
                'tagline' => 'Paket Komplit Siap Pakai Bisnis Resmi',
                'price' => 1499000,
                'original_price' => 2499000,
                'duration_days' => 5,
                'revision_count' => 3,
                'is_popular' => true,
                'sort_order' => 2,
                'is_active' => true,
                'cta_text' => 'Pilih Paket Bisnis Sekarang',
                'features' => [
                    'Hingga 5 Halaman Utama (Home, Tentang, Layanan, Portofolio, Kontak)',
                    'Pengerjaan 5-7 Hari Kerja',
                    'Dashboard CMS (Kelola konten & artikel mandiri)',
                    'Terhubung Google Maps & Form Kontak',
                    'Dasar Optimasi SEO Google (Cepat terindeks)',
                    'Domain Resmi .com/.id + Cloud Hosting 1 Tahun',
                    '3 Akun Email Bisnis (nama@domain.com)',
                    'Garansi Perbaikan & Pendampingan 30 Hari',
                ],
            ]
        );

        Package::updateOrCreate(
            ['slug' => 'paket-toko'],
            [
                'service_id' => $serviceStore->id,
                'name' => 'Webkita Toko / Custom',
                'tagline' => 'Sistem Otomatisasi Lengkap & Pembayaran Online',
                'price' => 3500000,
                'original_price' => 5500000,
                'duration_days' => 8,
                'revision_count' => 4,
                'is_popular' => false,
                'sort_order' => 3,
                'is_active' => true,
                'cta_text' => 'Pesan Paket Toko',
                'features' => [
                    'Arsitektur Laravel 11 / E-Commerce',
                    'Keranjang Belanja & Manajemen Stok',
                    'Pembayaran Otomatis Midtrans (QRIS & VA)',
                    'Hitung Ongkir Ekspedisi Otomatis',
                    'Dashboard Penjualan & Laporan Finansial',
                    'Notifikasi WhatsApp Invoice Otomatis',
                    'Garansi & Pendampingan Prioritas 60 Hari',
                ],
            ]
        );

        // 4. Seed Legal Pages
        PageLegal::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Kebijakan Privasi (Privacy Policy)',
                'content' => '<h3>1. Pendahuluan</h3><p>Webkita berkomitmen penuh untuk melindungi privasi dan data pribadi klien kami sesuai dengan Undang-Undang Perlindungan Data Pribadi (UU PDP) No. 27 Tahun 2022 di Republik Indonesia.</p><h3>2. Data yang Kami Kumpulkan</h3><p>Kami hanya mengumpulkan data yang Anda berikan secara sukarela saat mengajukan brief atau konsultasi, seperti nama lengkap, alamat email, nomor WhatsApp, dan materi bisnis untuk kebutuhan pembuatan website.</p><h3>3. Penggunaan Informasi</h3><p>Data yang dikumpulkan hanya digunakan untuk komunikasi pengerjaan proyek, penagihan invoice, dan dukungan teknis purna jual. Kami tidak pernah menjual atau membagikan data Anda kepada pihak ketiga manapun.</p><h3>4. Keamanan Data</h3><p>Seluruh transmisi data dan kredensial server dilindungi dengan enkripsi SSL 256-bit standar industri.</p>',
            ]
        );

        PageLegal::updateOrCreate(
            ['slug' => 'terms-of-service'],
            [
                'title' => 'Syarat & Ketentuan Layanan (Terms of Service)',
                'content' => '<h3>1. Ruang Lingkup Layanan</h3><p>Webkita menyediakan jasa perancangan UI/UX, pengembangan website, dan pemeliharaan sistem web berbasis Laravel dan standar web modern.</p><h3>2. Ketentuan Pembayaran</h3><p>Pengerjaan proyek dimulai setelah pembayaran Down Payment (DP) sebesar 50% atau pelunasan di muka. Pelunasan sisa 50% dilakukan saat website selesai diuji dan siap tayang (Go-Live).</p><h3>3. Garansi & Pemeliharaan</h3><p>Setiap paket dilengkapi garansi perbaikan bug dan error gratis (14 hingga 60 hari tergantung paket). Garansi tidak mencakup perubahan alur logika yang berada di luar kesepakatan brief awal.</p><h3>4. Hak Cipta & Kepemilikan</h3><p>Setelah pelunasan 100%, seluruh hak milik atas desain, kode sumber, dan konten website menjadi milik penuh klien.</p>',
            ]
        );

        // 5. Seed Blog Categories & Posts
        $catBiz = BlogCategory::updateOrCreate(
            ['slug' => 'strategi-bisnis'],
            [
                'name' => 'Strategi Bisnis',
                'description' => 'Wawasan dan panduan digitalisasi untuk meningkatkan penjualan dan kredibilitas bisnis.',
            ]
        );

        $catTech = BlogCategory::updateOrCreate(
            ['slug' => 'teknologi-web'],
            [
                'name' => 'Teknologi & Domain',
                'description' => 'Edukasi infrastruktur website, pemilihan nama domain, dan keamanan data digital.',
            ]
        );

        $catUx = BlogCategory::updateOrCreate(
            ['slug' => 'desain-konversi'],
            [
                'name' => 'Desain & Konversi',
                'description' => 'Strategi antarmuka pengguna (UI/UX) yang terbukti mendongkrak rasio konversi prospek.',
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'alasan-bisnis-wajib-punya-website-resmi'],
            [
                'category_id' => $catBiz->id,
                'title' => 'Mengapa Bisnis dan UMKM Wajib Memiliki Website Resmi di Era Digital',
                'excerpt' => 'Mengandalkan media sosial semata memiliki risiko besar pada kontrol audiens. Website mandiri adalah fondasi aset digital paling aman dan kredibel.',
                'content' => "Banyak pelaku usaha menganggap bahwa memiliki akun media sosial sudah cukup untuk memasarkan produk atau jasa. Namun, fakta di lapangan menunjukkan bahwa perilaku konsumen telah bertransformasi secara signifikan.\n\n### 1. Kontrol Penuh Tanpa Ketergantungan Algoritma\nDi media sosial, jangkauan organik akun bisnis Anda sepenuhnya ditentukan oleh perubahan algoritma platform yang dapat berubah sewaktu-waktu tanpa pemberitahuan. Sebaliknya, website resmi adalah properti digital milik Anda sendiri. Anda mengendalikan seluruh narasi merek, alur navigasi pelanggan, dan penempatan penawaran.\n\n### 2. Kredibilitas dan Tingkat Kepercayaan Konsumen\nCalon mitra B2B, investor, dan pelanggan bernilai tinggi cenderung melakukan pencarian di Google sebelum bertransaksi dalam nominal signifikan. Memiliki website dengan domain resmi (seperti .id atau .com) memberikan sinyal legalitas dan profesionalisme yang tidak dapat ditandingi oleh profil media sosial biasa.\n\n### 3. Otomatisasi Penjualan dan Layanan Pelanggan 24 Jam\nDengan arsitektur web modern, sistem dapat melayani calon pembeli secara simultan selama 24 jam sehari. Informasi spesifikasi layanan, daftar portofolio, hingga formulir pemesanan langsung terintegrasi ke WhatsApp atau dashboard manajemen tanpa harus menunggu balasan admin manual.\n\n### 4. Pelacakan Data dan Konversi yang Akurat\nWebsite memungkinkan pemasangan pelacak analitik standar industri seperti Google Analytics dan Meta Pixel secara privat dan sesuai regulasi perlindungan data. Anda dapat mengetahui halaman mana yang paling diminati, asal pengunjung, serta tingkat konversi prospek dengan data riil.\n\n### Kesimpulan\nInvestasi pada website resmi bukan lagi sekadar pelengkap, melainkan pilar utama ketahanan bisnis digital jangka panjang. Webkita hadir untuk membantu Anda merancang website yang cepat, aman, dan siap menghasilkan hasil nyata.",
                'author' => 'Tim Riset Webkita',
                'reading_time_minutes' => 4,
                'is_published' => true,
                'views_count' => 142,
                'published_at' => Carbon::now()->subDays(5),
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'panduan-memilih-domain-id-vs-com'],
            [
                'category_id' => $catTech->id,
                'title' => 'Panduan Memilih Domain: Keunggulan Domain .ID Dibandingkan .COM untuk Pasar Indonesia',
                'excerpt' => 'Ketahui regulasi, kecepatan akses lokal, dan pengaruh nama domain tingkat atas (TLD) terhadap optimasi mesin pencari lokal.',
                'content' => "Memilih ekstensi domain adalah keputusan awal yang menentukan citra serta penargetan geografis bisnis Anda di mata mesin pencari dan calon pembeli. Dua ekstensi terpopuler di Indonesia adalah .com dan .id.\n\n### Karakteristik Ekstensi .ID\nDomain tingkat atas berkode negara (.id) dikelola oleh PANDI (Pengelola Nama Domain Internet Indonesia). Keuntungan utama domain .id meliputi:\n\n- Relevansi SEO Lokal: Mesin pencari seperti Google memberikan bobot lokalitas yang lebih tinggi untuk penelusuran berbahasa Indonesia dengan niat lokal.\n- Ketersediaan Nama Cantik: Karena penggunanya lebih tersegmentasi dibanding .com global, peluang mendapatkan nama bisnis singkat dan mudah diingat masih sangat terbuka lebar.\n- Identitas Nasional yang Kuat: Menegaskan bahwa entitas Anda berbasis dan berkomitmen melayani pasar Republik Indonesia.\n\n### Kapan Menggunakan Domain .COM?\nEkstensi komersial global .com sangat direkomendasikan apabila bisnis Anda menargetkan klien ekspor, audiens internasional, atau produk digital berskala lintas negara.\n\n### Rekomendasi Praktis Webkita\nBagi perusahaan berbadan hukum (PT atau CV), pendaftaran domain resmi seperti webkita.co.id atau webkita.id sangat dianjurkan untuk mencegah pemalsuan nama merek. Untuk startup dan bisnis rintisan, domain .id menawarkan kombinasi terbaik antara prestise dan keterjangkauan.",
                'author' => 'Divisi Infrastruktur Webkita',
                'reading_time_minutes' => 5,
                'is_published' => true,
                'views_count' => 98,
                'published_at' => Carbon::now()->subDays(3),
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'faktor-kecepatan-loading-website-terhadap-penjualan'],
            [
                'category_id' => $catUx->id,
                'title' => 'Pengaruh Kecepatan Akses Website terhadap Rasio Penjualan dan Retensi Pengguna',
                'excerpt' => 'Keterlambatan 1 detik pada waktu muat halaman dapat memangkas konversi hingga 7 persen. Simak cara optimalisasi arsitekturnya.',
                'content' => "Kecepatan situs bukan sekadar metrik teknis, melainkan faktor penentu utama pengalaman pelanggan dan penjualan bisnis Anda. Riset menunjukkan lebih dari 50% pengguna smartphone akan meninggalkan website yang membutuhkan waktu muat lebih dari 3 detik.\n\n### Mengapa Website Lambat Terjadi?\nBeberapa penyebab umum performa website yang lambat antara lain:\n\n1. Ukuran Aset Tidak Teroptimasi: Gambar berukuran beberapa megabyte tanpa kompresi modern (seperti WebP atau AVIF).\n2. Penggunaan Plugin Berlebihan: Banyak situs berbasis CMS instan dibebani oleh puluhan skrip pihak ketiga yang tidak efisien.\n3. Infrastruktur Hosting Rendah: Penggunaan shared hosting yang berbagi sumber daya komputasi dengan ribuan situs lain.\n\n### Pendekatan Webkita: Clean Architecture & Modern Assets\nDi Studio Webkita, kami merancang website menggunakan Laravel dengan integrasi aset modern (Vite) dan teknik caching mutakhir. Kami memastikan:\n\n- Struktur DOM ringkas dan semantik.\n- Kompresi gambar optimal dan pemuatan bertahap (lazy loading).\n- Arsitektur CSS murni tanpa bloatware pihak ketiga.\n\nHasilnya adalah website yang memuat secara instan di jaringan 4G maupun koneksi WiFi publik, memastikan setiap prospek yang datang langsung diarahkan ke konversi tanpa hambatan.",
                'author' => 'Tim UI/UX & Rekayasa Webkita',
                'reading_time_minutes' => 6,
                'is_published' => true,
                'views_count' => 215,
                'published_at' => Carbon::now()->subDay(),
            ]
        );
    }
}
