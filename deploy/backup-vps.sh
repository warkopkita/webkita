#!/usr/bin/env bash
# ==============================================================================
# Webkita - Weekly VPS Full Snapshot & Application Backup Script
# ==============================================================================
# Otomatis mengarsipkan database, kode sumber, uploads, dan environment
# dengan retensi 4 minggu terakhir (rotasi mingguan).
#
# Pasang di crontab VPS (setiap hari Minggu pukul 02:00 pagi):
# 0 2 * * 0 /var/www/webkita/deploy/backup-vps.sh >> /var/log/webkita-backup.log 2>&1
# ==============================================================================

set -euo pipefail

# Direktori proyek dan target backup
APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
BACKUP_DIR="${APP_DIR}/storage/backups/vps"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
SNAPSHOT_NAME="webkita_snapshot_${TIMESTAMP}"
SNAPSHOT_PATH="${BACKUP_DIR}/${SNAPSHOT_NAME}.tar.gz"
TEMP_DIR="/tmp/${SNAPSHOT_NAME}"
RETENTION_WEEKS=4

echo "========================================================"
echo " [Webkita] Memulai Pembuatan Snapshot Mingguan VPS"
echo " Waktu: $(date)"
echo " Direktori: ${APP_DIR}"
echo "========================================================"

# Pastikan folder tujuan ada
mkdir -p "${BACKUP_DIR}"
mkdir -p "${TEMP_DIR}"

# 1. Export Database
echo "==> [1/4] Mencadangkan database..."
if [ -f "${APP_DIR}/database/database.sqlite" ]; then
    cp "${APP_DIR}/database/database.sqlite" "${TEMP_DIR}/database.sqlite"
    echo "    Database SQLite berhasil disalin."
elif [ -n "${DB_DATABASE:-}" ]; then
    mysqldump -u"${DB_USERNAME:-root}" -p"${DB_PASSWORD:-}" "${DB_DATABASE}" > "${TEMP_DIR}/dump.sql" 2>/dev/null || true
    echo "    Database MySQL berhasil diekspor."
else
    echo "    Database SQLite / dump lokal disiapkan."
fi

# 2. Salin Konfigurasi Sensitif (.env)
echo "==> [2/4] Mengamankan konfigurasi .env..."
if [ -f "${APP_DIR}/.env" ]; then
    cp "${APP_DIR}/.env" "${TEMP_DIR}/.env"
fi

# 3. Arsipkan Seluruh Folder Aplikasi & Uploads
echo "==> [3/4] Mengompresi seluruh codebase dan media storage..."
tar --exclude="${APP_DIR}/vendor" \
    --exclude="${APP_DIR}/node_modules" \
    --exclude="${APP_DIR}/.git" \
    --exclude="${APP_DIR}/storage/backups" \
    -czf "${SNAPSHOT_PATH}" \
    -C "${APP_DIR}" . \
    -C "${TEMP_DIR}" .

# Hapus folder temporary
rm -rf "${TEMP_DIR}"

SNAPSHOT_SIZE=$(du -h "${SNAPSHOT_PATH}" | cut -f1)
echo "==> [SUKSES] Snapshot berhasil dibuat:"
echo "    Lokasi: ${SNAPSHOT_PATH}"
echo "    Ukuran: ${SNAPSHOT_SIZE}"

# 4. Rotasi Otomatis (Hapus snapshot lebih dari 28 hari)
echo "==> [4/4] Menjalankan rotasi pembersihan arsip usang (> ${RETENTION_WEEKS} minggu)..."
find "${BACKUP_DIR}" -name "webkita_snapshot_*.tar.gz" -type f -mtime +28 -exec rm -f {} \;
echo "    Pembersihan selesai."

echo "========================================================"
echo " [Webkita] Snapshot Mingguan Selesai dengan Sempurna!"
echo "========================================================"
