<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PageLegal;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
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
    }
}
