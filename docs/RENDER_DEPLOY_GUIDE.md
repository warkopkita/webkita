# [PANDUAN DEPLOY RENDER.COM] Webkita Cloud Hosting Gratis

Dokumen ini memandu langkah demi langkah cara men-deploy platform **Webkita** ke cloud hosting gratis **Render.com** (mendukung Web Service Docker, database PostgreSQL gratis, dan SSL otomatis).

---

## [BAGIAN 01] Arsitektur Deployment di Render.com

Platform Render.com menyediakan lingkungan serverless cloud:

```text
               ┌────────────────────────────────────────────────────────┐
               │                Internet / Pengunjung Web               │
               └───────────────────────────┬────────────────────────────┘
                                           │ HTTPS (Port 443 / SSL Otomatis)
                                           ▼
               ┌────────────────────────────────────────────────────────┐
               │  [Web Service] Render.com Free Tier                    │
               │  - Subdomain Gratis: https://webkita-app.onrender.com │
               │  - Single Container: Nginx + PHP 8.3 FPM               │
               │  - Auto Asset Caching & Gzip Compression               │
               └───────────────────────────┬────────────────────────────┘
                                           │ Internal Connection
                                           ▼
               ┌────────────────────────────────────────────────────────┐
               │  [Database] Render Managed PostgreSQL 16               │
               │  - Internal Connection String (DATABASE_URL)           │
               │  - Otomatis Migrasi & Database Seeder                  │
               └────────────────────────────────────────────────────────┘
```

Spesifikasi konfigurasi yang telah disiapkan:
1. `Dockerfile.render`: Image multi-stage terpadu (Node.js 20 Vite builder + PHP 8.3 FPM + Nginx) yang otomatis menyesuaikan `$PORT` dinamis dari Render.
2. `render.yaml`: Blueprint Infrastructure-as-Code (IaC) untuk deploy 1-klik seluruh layanan web dan basis data sekaligus.
3. `docker/render/entrypoint.sh`: Skrip boot otomatis yang menjalankan migrasi tabel, seeder, symlink storage, dan optimasi cache.

---

## [BAGIAN 02] Metode 1: Deploy 1-Klik via Blueprint (Direkomendasikan)

Metode ini paling cepat karena Render membaca file `render.yaml` dan otomatis membuat Web Service dan Database PostgreSQL.

### Langkah 2.1: Pastikan Repositori Telah Berada di GitHub

Pastikan kode terbaru Webkita telah di-push ke GitHub Anda:

```bash
git add .
git commit -m "feat(render): add Render.com blueprint, Dockerfile.render and configs"
git push origin master
```

### Langkah 2.2: Buka Render Dashboard & Buat Blueprint Instance

1. Buka [https://dashboard.render.com/](https://dashboard.render.com/) dan login (bisa menggunakan akun GitHub).
2. Di halaman Dashboard, klik tombol **"New +"** di pojok kanan atas, lalu pilih **"Blueprint"**.
3. Hubungkan akun GitHub Anda dan pilih repositori `webkita`.
4. Render akan otomatis mendeteksi file `render.yaml` di repositori dan menampilkan ringkasan:
   - **Service Name**: `webkita-app` (Web Service, Runtime Docker, Plan Free)
   - **Database Name**: `webkita-db` (PostgreSQL Managed, Plan Free)
   - **Region**: Singapore (latensi terendah untuk akses dari Indonesia)
5. Klik tombol **"Apply"**.
6. Render akan mulai mem-build image Docker dan menjalankan migrasi basis data secara otomatis.

---

## [BAGIAN 03] Metode 2: Deploy Manual via Render Dashboard

Jika Anda lebih memilih membuat layanan satu per satu tanpa blueprint:

### Langkah 3.1: Buat Basis Data PostgreSQL Gratis

1. Klik tombol **"New +"** -> Pilih **"PostgreSQL"**.
2. Masukkan parameter:
   - **Name**: `webkita-db`
   - **Database**: `webkita_db`
   - **User**: `webkita_user`
   - **Region**: `Singapore`
   - **Plan**: `Free`
3. Klik **"Create Database"**.
4. Setelah dibuat, salin nilai **"Internal Database URL"** (contoh: `postgres://webkita_user:...@dpg-...-a/webkita_db`).

### Langkah 3.2: Buat Web Service Docker

1. Klik tombol **"New +"** -> Pilih **"Web Service"**.
2. Pilih repositori GitHub `webkita`.
3. Masukkan parameter konfigurasi:
   - **Name**: `webkita-app`
   - **Region**: `Singapore`
   - **Branch**: `master`
   - **Runtime**: `Docker`
   - **Dockerfile Path**: `./Dockerfile.render`
   - **Docker Build Context Directory**: `.`
   - **Plan**: `Free`
4. Di bagian **Environment Variables**, tambahkan:

| Nama Variabel | Nilai Contoh | Keterangan |
| :--- | :--- | :--- |
| `APP_NAME` | `Webkita` | Nama aplikasi |
| `APP_ENV` | `production` | Mode produksi |
| `APP_DEBUG` | `false` | Keamanan produksi |
| `APP_KEY` | *(Klik "Generate" atau isi APP_KEY Anda)* | Kunci enkripsi Laravel |
| `DB_CONNECTION` | `pgsql` | Driver database PostgreSQL |
| `DATABASE_URL` | *(Tempel Internal Database URL dari Langkah 3.1)* | Koneksi database |
| `SESSION_DRIVER` | `cookie` | Mandiri tanpa Redis |
| `CACHE_STORE` | `database` | Cache via basis data |
| `QUEUE_CONNECTION` | `database` | Antrean antarmuka |
| `RUN_SEEDER` | `true` | Otomatis isi data katalog & admin awal |
| `LOG_CHANNEL` | `stderr` | Menampilkan log langsung di konsol Render |

5. Klik **"Create Web Service"**.

---

## [BAGIAN 04] Pilihan Database Lain (Alternatif Gratis)

Selain PostgreSQL internal Render, Webkita juga mendukung opsi database gratis lainnya:

1. **SQLite (File Lokal)**:
   - Cukup ubah `DB_CONNECTION=sqlite` di Environment Variables.
   - Database disimpan di `database/database.sqlite` di dalam kontainer.
   - *Catatan*: Pada free tier Render tanpa persistent disk, data akan di-reset jika kontainer di-restart.

2. **Neon.tech / Supabase / Aiven (PostgreSQL Cloud Gratis Abadi)**:
   - Buat akun gratis di [https://neon.tech/](https://neon.tech/) atau [https://supabase.com/](https://supabase.com/).
   - Dapatkan Connection String PostgreSQL (`postgres://...`).
   - Masukkan string tersebut ke variabel `DATABASE_URL` di Render.

3. **TiDB Cloud / Aiven (MySQL Cloud Gratis)**:
   - Buat database MySQL gratis di [https://tidbcloud.com/](https://tidbcloud.com/) atau [https://aiven.io/](https://aiven.io/).
   - Set `DB_CONNECTION=mysql` dan masukkan kredensial `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

---

## [BAGIAN 05] Tips Optimasi Free Tier Render.com

### 1. Menangani "Cold Start" (Sleep Setelah 15 Menit Tidak Aktif)
Pada Free Tier Render, jika tidak ada kunjungan selama 15 menit, server akan beralih ke status sleep (tidur). Kunjungan pertama setelah sleep akan memerlukan waktu ~30-50 detik untuk bangun.

**Solusi Ping Otomatis Gratis**:
1. Buat akun gratis di [https://uptimerobot.com/](https://uptimerobot.com/) atau [https://cron-job.org/](https://cron-job.org/).
2. Buat monitor HTTP baru yang menembak URL Webkita Anda (misal `https://webkita-app.onrender.com`) setiap 10 menit sekali.
3. Dengan cara ini, server Render akan selalu aktif 24/7 dan terhindar dari cold start.

### 2. Memasang Domain Kustom Sendiri (Contoh: `webkita.id`)
1. Di Dashboard Web Service Render, buka tab **"Settings"** -> gulir ke **"Custom Domains"**.
2. Masukkan domain Anda (misal: `webkita.id` atau `app.webkita.id`).
3. Render akan memberikan target CNAME (misal: `webkita-app.onrender.com`).
4. Buka DNS Management domain Anda (Cloudflare, Niagahoster, Domainesia, dll) dan buat record CNAME yang mengarah ke target tersebut.
5. Render akan secara otomatis menerbitkan sertifikat SSL Let's Encrypt secara gratis.
