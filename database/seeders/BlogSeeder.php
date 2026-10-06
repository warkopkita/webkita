<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        // Article 1
        BlogPost::updateOrCreate(
            ['slug' => 'alasan-bisnis-wajib-punya-website-resmi'],
            [
                'category_id' => $catBiz->id,
                'title' => 'Mengapa Bisnis dan UMKM Wajib Memiliki Website Resmi di Era Digital',
                'excerpt' => 'Mengandalkan media sosial semata memiliki risiko besar pada kontrol audiens. Website mandiri adalah fondasi aset digital paling aman dan kredibel.',
                'content' => <<<MARKDOWN
Banyak pelaku usaha menganggap bahwa memiliki akun media sosial sudah cukup untuk memasarkan produk atau jasa. Namun, fakta di lapangan menunjukkan bahwa perilaku konsumen telah bertransformasi secara signifikan.

### 1. Kontrol Penuh Tanpa Ketergantungan Algoritma
Di media sosial, jangkauan organik akun bisnis Anda sepenuhnya ditentukan oleh perubahan algoritma platform yang dapat berubah sewaktu-waktu tanpa pemberitahuan. Sebaliknya, website resmi adalah properti digital milik Anda sendiri. Anda mengendalikan seluruh narasi merek, alur navigasi pelanggan, dan penempatan penawaran.

### 2. Kredibilitas dan Tingkat Kepercayaan Konsumen
Calon mitra B2B, investor, dan pelanggan bernilai tinggi cenderung melakukan pencarian di Google sebelum bertransaksi dalam nominal signifikan. Memiliki website dengan domain resmi (seperti .id atau .com) memberikan sinyal legalitas dan profesionalisme yang tidak dapat ditandingi oleh profil media sosial biasa.

### 3. Otomatisasi Penjualan dan Layanan Pelanggan 24 Jam
Dengan arsitektur web modern, sistem dapat melayani calon pembeli secara simultan selama 24 jam sehari. Informasi spesifikasi layanan, daftar portofolio, hingga formulir pemesanan langsung terintegrasi ke WhatsApp atau dashboard manajemen tanpa harus menunggu balasan admin manual.

### 4. Pelacakan Data dan Konversi yang Akurat
Website memungkinkan pemasangan pelacak analitik standar industri seperti Google Analytics dan Meta Pixel secara privat dan sesuai regulasi perlindungan data. Anda dapat mengetahui halaman mana yang paling diminati, asal pengunjung, serta tingkat konversi prospek dengan data riil.

### Kesimpulan
Investasi pada website resmi bukan lagi sekadar pelengkap, melainkan pilar utama ketahanan bisnis digital jangka panjang. Webkita hadir untuk membantu Anda merancang website yang cepat, aman, dan siap menghasilkan hasil nyata.
MARKDOWN,
                'author' => 'Tim Riset Webkita',
                'reading_time_minutes' => 4,
                'is_published' => true,
                'views_count' => 142,
                'published_at' => Carbon::now()->subDays(5),
            ]
        );

        // Article 2
        BlogPost::updateOrCreate(
            ['slug' => 'panduan-memilih-domain-id-vs-com'],
            [
                'category_id' => $catTech->id,
                'title' => 'Panduan Memilih Domain: Keunggulan Domain .ID Dibandingkan .COM untuk Pasar Indonesia',
                'excerpt' => 'Ketahui regulasi, kecepatan akses lokal, dan pengaruh nama domain tingkat atas (TLD) terhadap optimasi mesin pencari lokal.',
                'content' => <<<MARKDOWN
Memilih ekstensi domain adalah keputusan awal yang menentukan citra serta penargetan geografis bisnis Anda di mata mesin pencari dan calon pembeli. Dua ekstensi terpopuler di Indonesia adalah .com dan .id.

### Karakteristik Ekstensi .ID
Domain tingkat atas berkode negara (.id) dikelola oleh PANDI (Pengelola Nama Domain Internet Indonesia). Keuntungan utama domain .id meliputi:

- **Relevansi SEO Lokal**: Mesin pencari seperti Google memberikan bobot lokalitas yang lebih tinggi untuk penelusuran berbahasa Indonesia dengan niat lokal.
- **Ketersediaan Nama Cantik**: Karena penggunanya lebih tersegmentasi dibanding .com global, peluang mendapatkan nama bisnis singkat dan mudah diingat masih sangat terbuka lebar.
- **Identitas Nasional yang Kuat**: Menegaskan bahwa entitas Anda berbasis dan berkomitmen melayani pasar Republik Indonesia.

### Kapan Menggunakan Domain .COM?
Ekstensi komersial global .com sangat direkomendasikan apabila bisnis Anda menargetkan klien ekspor, audiens internasional, atau produk digital berskala lintas negara.

### Rekomendasi Praktis Webkita
Bagi perusahaan berbadan hukum (PT atau CV), pendaftaran domain resmi seperti webkita.co.id atau webkita.id sangat dianjurkan untuk mencegah pemalsuan nama merek. Untuk startup dan bisnis rintisan, domain .id menawarkan kombinasi terbaik antara prestise dan keterjangkauan.
MARKDOWN,
                'author' => 'Divisi Infrastruktur Webkita',
                'reading_time_minutes' => 5,
                'is_published' => true,
                'views_count' => 98,
                'published_at' => Carbon::now()->subDays(3),
            ]
        );

        // Article 3
        BlogPost::updateOrCreate(
            ['slug' => 'faktor-kecepatan-loading-website-terhadap-penjualan'],
            [
                'category_id' => $catUx->id,
                'title' => 'Pengaruh Kecepatan Akses Website terhadap Rasio Penjualan dan Retensi Pengguna',
                'excerpt' => 'Keterlambatan 1 detik pada waktu muat halaman dapat memangkas konversi hingga 7 persen. Simak cara optimalisasi arsitekturnya.',
                'content' => <<<MARKDOWN
Kecepatan situs bukan sekadar metrik teknis, melainkan faktor penentu utama pengalaman pelanggan dan penjualan bisnis Anda. Riset menunjukkan lebih dari 50% pengguna smartphone akan meninggalkan website yang membutuhkan waktu muat lebih dari 3 detik.

### Mengapa Website Lambat Terjadi?
Beberapa penyebab umum performa website yang lambat antara lain:

1. **Ukuran Aset Tidak Teroptimasi**: Gambar berukuran beberapa megabyte tanpa kompresi modern (seperti WebP atau AVIF).
2. **Penggunaan Plugin Berlebihan**: Banyak situs berbasis CMS instan dibebani oleh puluhan skrip pihak ketiga yang tidak efisien.
3. **Infrastruktur Hosting Rendah**: Penggunaan shared hosting yang berbagi sumber daya komputasi dengan ribuan situs lain.

### Pendekatan Webkita: Clean Architecture & Modern Assets
Di Studio Webkita, kami merancang website menggunakan Laravel dengan integrasi aset modern (Vite) dan teknik caching mutakhir. Kami memastikan:

- Struktur DOM ringkas dan semantik.
- Kompresi gambar optimal dan pemuatan bertahap (lazy loading).
- Arsitektur CSS murni tanpa bloatware pihak ketiga.

Hasilnya adalah website yang memuat secara instan di jaringan 4G maupun koneksi WiFi publik, memastikan setiap prospek yang datang langsung diarahkan ke konversi tanpa hambatan.
MARKDOWN,
                'author' => 'Tim UI/UX & Rekayasa Webkita',
                'reading_time_minutes' => 6,
                'is_published' => true,
                'views_count' => 215,
                'published_at' => Carbon::now()->subDay(),
            ]
        );
    }
}
