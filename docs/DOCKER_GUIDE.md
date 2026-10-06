# 🐳 Panduan Deployment Docker Webkita

Dokumen ini memandu langkah demi langkah cara men-deploy platform **Webkita** menggunakan **Docker & Docker Compose** untuk server Cloud VPS (DigitalOcean, IDCloudHost, Linode, AWS, Hetzner, dll) atau pengujian lokal.

---

## 🏗️ 1. Arsitektur Multi-Container

Sistem Docker Webkita dirancang dengan pemisahan tanggung jawab (*separation of concerns*) yang aman dan terisolasi:

```text
               ┌────────────────────────────────────────────────────────┐
               │                Internet / Cloudflare CDN               │
               └───────────────────────────┬────────────────────────────┘
                                           │ Port 80 / 443
                                           ▼
               ┌────────────────────────────────────────────────────────┐
               │  [web] Nginx 1.25 Alpine                               │
               │  - Static Asset Caching (CSS/JS/Images)                │
               │  - Gzip Compression & Security Headers                 │
               └───────────────────────────┬────────────────────────────┘
                                           │ FastCGI (Port 9000)
                                           ▼
               ┌────────────────────────────────────────────────────────┐
               │  [app] PHP 8.3 FPM Alpine                              │
               │  - Laravel 11.x Core Engine                            │
               │  - OPcache JIT & Production Optimization               │
               └──────────────┬──────────────────────────┬──────────────┘
                              │                          │
                              ▼                          ▼
               ┌──────────────────────────┐   ┌──────────────────────────┐
               │  [db] MySQL 8.0          │   │  [redis] Redis 7 Alpine  │
               │  - Persistent Volume     │   │  - Cache Engine          │
               │  - Users, Orders, CMS    │   │  - Session Storage       │
               └──────────────────────────┘   │  - Queue Broker          │
                                              └──────────┬───────────────┘
                                                         │
                                                         ▼
                                              ┌──────────────────────────┐
                                              │  [queue] Queue Worker    │
                                              │  - Email Dispatch        │
                                              │  - Webhook Notification  │
                                              └──────────────────────────┘
                                                         │
                                                         ▼
                                              ┌──────────────────────────┐
                                              │  [scheduler] Cron Runner │
                                              │  - Daily DB Backup       │
                                              │  - Auto Maintenance     │
                                              └──────────────────────────┘
```

---

## 📋 2. Prasyarat Server VPS

Pastikan VPS Anda (disarankan **Ubuntu 22.04 LTS** atau **24.04 LTS**) telah terpasang Docker & Docker Compose:

```bash
# Update sistem
sudo apt update && sudo apt upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh

# Pasang Docker Compose Plugin
sudo apt install -y docker-compose-plugin

# Verifikasi instalasi
docker --version
docker compose version
```

---

## 🚀 3. Langkah Deploy 1-Klik

### Langkah 3.1: Unduh / Clone Repositori

```bash
cd /var/www
git clone https://github.com/your-username/webkita.git webkita
cd webkita
```

### Langkah 3.2: Konfigurasi Environment `.env`

Salin template docker environment dan sesuaikan konfigurasi Anda:

```bash
cp .env.docker.example .env
```

Buka file `.env` dan perbarui:
1. `APP_KEY` (Generate menggunakan perintah di bawah jika belum ada).
2. `APP_URL` menjadi domain resmi Anda (contoh: `https://webkita.id`).
3. `DB_PASSWORD` & `DB_ROOT_PASSWORD` untuk keamanan basis data.
4. Kredensial Midtrans (`MIDTRANS_SERVER_KEY` & `MIDTRANS_CLIENT_KEY`).

### Langkah 3.3: Build & Jalankan Seluruh Kontainer

Jalankan satu perintah berikut:

```bash
docker compose up -d --build
```

Docker akan secara otomatis:
1. Menjalankan stage Node.js 20 untuk me-minify seluruh aset Tailwind CSS & Alpine.js via Vite.
2. Membangun runtime PHP 8.3-FPM dengan ekstensi `pdo_mysql`, `bcmath`, `opcache`, `gd`, `zip`, dan `redis`.
3. Mengunduh dependensi Composer `--no-dev` yang dioptimasi.
4. Menjalankan entrypoint yang mengaktifkan permission storage, database migrations, dan cache config/route/views.
5. Menjalankan Nginx, MySQL, Redis, Background Queue Worker, dan Scheduler cron.

### Langkah 3.4: Jalankan Database Seeder (Hanya Saat Pertama Kali Deploy)

Isi basis data dengan akun admin awal, katalog paket layanan, artikel blog, dan halaman legal:

```bash
docker compose exec app php artisan db:seed --force
```

Selesai! Website Webkita kini aktif dan dapat diakses di IP VPS atau domain Anda.

---

## 🛠️ 4. Perintah Operasional Harian

### Memeriksa Status Kontainer

```bash
docker compose ps
```

### Melihat Log Real-time

```bash
# Seluruh log kontainer
docker compose logs -f

# Hanya log aplikasi Laravel
docker compose logs -f app

# Hanya log Nginx web server
docker compose logs -f web

# Hanya log antrean worker email
docker compose logs -f queue
```

### Masuk ke Shell Kontainer PHP

```bash
docker compose exec app sh
```

### Menjalankan Perintah Artisan

```bash
docker compose exec app php artisan route:list
docker compose exec app php artisan cache:clear
docker compose exec app php artisan queue:restart
```

### Backup Database MySQL Langsung dari Kontainer

```bash
docker compose exec db mysqldump -uwebkita_user -pSecret2026Webkita! webkita_db > backup_$(date +%Y%m%d).sql
```

### Memperbarui Kode Aplikasi (Update / Patch)

```bash
git pull origin master
docker compose build app web
docker compose up -d
docker compose exec app php artisan migrate --force
docker compose exec app php artisan optimize
```

---

## 🔒 5. Konfigurasi Domain & SSL (Cloudflare)

Jika menggunakan Cloudflare (Sangat direkomendasikan):
1. Arahkan **A Record** `webkita.id` ke IP Publik VPS Anda dengan proxy status **Proxied (Awan Oranye)**.
2. Di menu Cloudflare SSL/TLS, pilih mode **Flexible** (Nginx container menerima port 80 dan Cloudflare melayani HTTPS ke pengunjung) atau pasang sertifikat Origin Certificate di Nginx untuk mode **Full (Strict)**.
3. Aktifkan fitur **"Always Use HTTPS"** di Cloudflare Dashboard.

---

## 📁 6. Ringkasan File Konfigurasi Docker

- [`Dockerfile`](file:///c:/Users/moham/Downloads/webkita/Dockerfile): Blueprint image multi-stage (Node 20 Vite builder + PHP 8.3 FPM).
- [`docker-compose.yml`](file:///c:/Users/moham/Downloads/webkita/docker-compose.yml): Orkestrasi 6 layanan (app, web, db, redis, queue, scheduler).
- [`docker/nginx/default.conf`](file:///c:/Users/moham/Downloads/webkita/docker/nginx/default.conf): Konfigurasi reverse proxy dan static caching Nginx.
- [`docker/php/php.ini`](file:///c:/Users/moham/Downloads/webkita/docker/php/php.ini): Tuning resource memory & body limit PHP 8.3.
- [`docker/php/opcache.ini`](file:///c:/Users/moham/Downloads/webkita/docker/php/opcache.ini): OPcache JIT compiler untuk kecepatan maksimal.
- [`docker/entrypoint.sh`](file:///c:/Users/moham/Downloads/webkita/docker/entrypoint.sh): Inisialisasi otomatis symlink, migrasi, dan cache warm-up.
- [`.env.docker.example`](file:///c:/Users/moham/Downloads/webkita/.env.docker.example): Template variabel lingkungan siap pakai untuk Docker.
