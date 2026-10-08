@echo off
title Webkita - Studio Launcher 2026
color 0b
cls
echo ========================================================
echo    WEBKITA WEB DEVELOPMENT STUDIO - 1-KLIK ONLINE
echo ========================================================
echo.
echo [1/3] Menjalankan Docker Container Cluster...
docker compose up -d
echo.
echo [2/3] Menghubungkan Cloudflare Tunnel Publik...
start /b cloudflared tunnel --url http://127.0.0.1:80
echo.
echo [3/3] Selesai! Webkita siap diakses:
echo - Akses Lokal    : http://127.0.0.1
echo - Halaman Katalog: http://127.0.0.1/katalog
echo - Login Admin    : http://127.0.0.1/login
echo.
echo Membuka katalog Webkita di browser...
timeout /t 2 /nobreak >nul
start http://127.0.0.1/katalog
echo.
echo Tekan tombol apa saja untuk menutup jendela ini (server tetap berjalan).
pause >nul
