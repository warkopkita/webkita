#!/bin/bash
set -e

# ==============================================================================
# Script Otomasi Backup Harian Database Webkita
# Cron Job: 0 2 * * * /var/www/webkita/deploy/backup-db.sh >> /var/log/webkita-backup.log 2>&1
# ==============================================================================

BACKUP_DIR="/var/backups/webkita"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
RETENTION_DAYS=30

mkdir -p "$BACKUP_DIR"

echo ">>> [$(date)] Memulai proses backup database Webkita..."

# Ambil konfigurasi dari file .env jika ada
if [ -f "/var/www/webkita/.env" ]; then
    DB_CONNECTION=$(grep -E "^DB_CONNECTION=" /var/www/webkita/.env | cut -d '=' -f2)
    DB_HOST=$(grep -E "^DB_HOST=" /var/www/webkita/.env | cut -d '=' -f2)
    DB_DATABASE=$(grep -E "^DB_DATABASE=" /var/www/webkita/.env | cut -d '=' -f2)
    DB_USERNAME=$(grep -E "^DB_USERNAME=" /var/www/webkita/.env | cut -d '=' -f2)
    DB_PASSWORD=$(grep -E "^DB_PASSWORD=" /var/www/webkita/.env | cut -d '=' -f2)
fi

BACKUP_FILE="${BACKUP_DIR}/webkita_db_${TIMESTAMP}.sql.gz"

if [ "$DB_CONNECTION" = "mysql" ]; then
    echo ">>> Melakukan mysqldump untuk database ${DB_DATABASE}..."
    mysqldump -h "${DB_HOST:-127.0.0.1}" -u "${DB_USERNAME:-root}" -p"${DB_PASSWORD}" "${DB_DATABASE}" | gzip > "$BACKUP_FILE"
else
    # Fallback SQLite backup
    SQLITE_PATH="${DB_DATABASE:-/var/www/webkita/database/database.sqlite}"
    if [ -f "$SQLITE_PATH" ]; then
        echo ">>> Melakukan backup SQLite dari ${SQLITE_PATH}..."
        gzip -c "$SQLITE_PATH" > "$BACKUP_FILE"
    else
        echo ">>> [ERROR] File database tidak ditemukan!"
        exit 1
    fi
fi

# Validasi ukuran file backup
if [ -s "$BACKUP_FILE" ]; then
    BACKUP_SIZE=$(du -h "$BACKUP_FILE" | cut -f1)
    echo ">>> Backup selesai berhasil: ${BACKUP_FILE} (Ukuran: ${BACKUP_SIZE})"
else
    echo ">>> [ERROR] File backup kosong atau gagal dibuat!"
    exit 1
fi

# Rotasi dan pembersihan backup lawas (lebih dari 30 hari)
echo ">>> Membersihkan arsip backup yang berumur lebih dari ${RETENTION_DAYS} hari..."
find "$BACKUP_DIR" -type f -name "webkita_db_*.sql.gz" -mtime +"$RETENTION_DAYS" -exec rm -f {} \;

echo ">>> [$(date)] Proses backup harian Webkita selesai dengan sukses."
