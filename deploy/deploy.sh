#!/bin/bash
set -e

echo ">>> [Webkita] Memulai proses deployment produksi..."

# 1. Masuk ke direktori root aplikasi
cd /var/www/webkita

# 2. Aktifkan Maintenance Mode jika diperlukan
php artisan down --render="errors::503" --secret="webkita-bypass-2026" || true

# 3. Tarik update terbaru dari git main
echo ">>> Menarik perubahan kode terbaru dari Git..."
git fetch origin main
git reset --hard origin/main

# 4. Install dependensi Composer produksi
echo ">>> Menginstall dependensi Composer produksi..."
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 5. Jalankan migrasi database
echo ">>> Menjalankan migrasi database..."
php artisan migrate --force

# 6. Build aset frontend produksi via Vite
echo ">>> Mengompilasi aset frontend..."
npm ci --prefer-offline --no-audit
npm run build

# 7. Bersihkan & cache konfigurasi, rute, dan view
echo ">>> Mengoptimalkan cache Laravel..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 8. Restart background workers
echo ">>> Memperbarui queue worker..."
php artisan queue:restart
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl restart webkita-worker:*

# 9. Atur perizinan file folder storage
echo ">>> Menetapkan izin direktori storage & cache..."
chown -R www-data:www-data /var/www/webkita
chmod -R 775 /var/www/webkita/storage /var/www/webkita/bootstrap/cache

# 10. Matikan Maintenance Mode (Aplikasi Online)
php artisan up

echo ">>> [Webkita] Deployment berhasil diselesaikan! Website live dan optimal."
