# 🌐 Panduan Hosting Gratis Webkita (Langsung Online)

Dokumen ini menyediakan 2 metode untuk meng-online-kan platform **Webkita** secara **100% GRATIS** tanpa perlu membeli domain atau menyewa VPS berbayar.

---

## ⚡ METODE 1: Langsung Online Detik Ini (Cloudflare Edge Tunnel)

Metode ini menghubungkan server lokal Anda langsung ke jaringan global Cloudflare dan menghasilkan tautan publik HTTPS resmi yang aman dan berkecepatan tinggi.

### 🔗 Tautan Publik Anda yang Aktif Saat Ini:
> ### 🌍 [https://adjustable-more-persons-singles.trycloudflare.com](https://adjustable-more-persons-singles.trycloudflare.com)

**Keunggulan**:
- **Langsung Aktif Sekarang**: Bisa langsung Anda buka di smartphone, bagikan ke calon klien, atau tim.
- **Gratis 100%**: Tidak memerlukan kartu kredit maupun pendaftaran akun.
- **SSL HTTPS Resmi**: Terenkripsi otomatis dengan sertifikat Cloudflare.
- **Semua Fitur Berfungsi**: Checkout, simulasi bayar, portal klien, admin panel, kalkulator, dan formulir lead.

**Catatan Operasional**:
Tautan ini tetap aktif selama terminal/laptop Anda menyala dan menjalankan tunnel. Jika ingin menyalakan ulang di kemudian hari, cukup jalankan perintah:
```powershell
cloudflared tunnel --url http://127.0.0.1:8000
```

---

## ☁️ METODE 2: Online 24/7 di Cloud Gratis (Render.com / Koyeb)

Jika Anda ingin website Webkita tetap online 24 jam non-stop di internet meskipun laptop Anda dimatikan, Anda dapat menggunakan layanan **Free Web Service** di **Render.com** atau **Koyeb.com**.

### Langkah Deploy ke Render.com (Gratis):

1. **Buat Repositori di GitHub**:
   - Buka [github.com](https://github.com) dan buat repository baru (misal `webkita`).
   - Push kode dari laptop Anda:
     ```bash
     git remote add origin https://github.com/USERNAME/webkita.git
     git branch -M main
     git push -u origin main
     ```

2. **Daftar di Render.com**:
   - Kunjungi [render.com](https://render.com) dan login menggunakan akun GitHub Anda.

3. **Deploy Web Service**:
   - Klik **"New +"** lalu pilih **"Web Service"**.
   - Hubungkan ke repository `webkita` Anda.
   - Render akan otomatis mendeteksi file [`Dockerfile`](../Dockerfile) dan [`render.yaml`](../render.yaml) yang telah kita siapkan.
   - Pilih Instance Type: **Free**.
   - Klik **"Create Web Service"**.

4. **Selesai**:
   - Render akan otomatis mem-build dan memberikan domain gratis ber-SSL, contoh: `https://webkita.onrender.com`.
