<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Pembayaran Terverifikasi — Webkita</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #1E0A38; color: #FFFFFF; margin: 0; padding: 20px; line-height: 1.6; }
        .wrapper { max-width: 600px; margin: 0 auto; background-color: #270D52; border-radius: 16px; border: 1px solid rgba(255,255,255,0.15); overflow: hidden; }
        .header { background: linear-gradient(135deg, #451C7E, #270D52); padding: 32px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo { font-size: 24px; font-weight: 900; color: #FFFFFF; letter-spacing: -0.5px; }
        .logo span { color: #C8F169; }
        .content { padding: 32px; }
        .badge-verified { display: inline-block; background-color: rgba(200,241,105,0.2); color: #C8F169; border: 1px solid #C8F169; font-weight: 800; font-size: 11px; padding: 4px 12px; border-radius: 9999px; font-family: monospace; text-transform: uppercase; margin-bottom: 16px; }
        .heading { font-size: 20px; font-weight: 800; color: #FFFFFF; margin-top: 0; margin-bottom: 12px; }
        .lead { font-size: 14px; color: #E9D5FF; margin-bottom: 24px; }
        .receipt-card { background-color: #1A0630; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); padding: 20px; margin-bottom: 24px; }
        .row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 13px; }
        .row:last-child { border-bottom: none; }
        .label { color: #DDD6FE; font-family: monospace; font-size: 11px; text-transform: uppercase; }
        .value { color: #FFFFFF; font-weight: bold; text-align: right; }
        .value-lime { color: #C8F169; font-weight: 900; font-family: monospace; font-size: 16px; }
        .btn { display: block; text-align: center; background-color: #C8F169; color: #1E0A38; font-weight: 800; font-size: 14px; text-decoration: none; padding: 14px 24px; border-radius: 9999px; margin-top: 24px; text-transform: uppercase; letter-spacing: 0.5px; }
        .btn-outline { display: block; text-align: center; background-color: transparent; border: 1px solid rgba(255,255,255,0.3); color: #FFFFFF; font-weight: 600; font-size: 13px; text-decoration: none; padding: 12px 24px; border-radius: 9999px; margin-top: 10px; }
        .footer { padding: 24px 32px; background-color: #170533; text-align: center; font-size: 11px; color: #A78BFA; border-top: 1px solid rgba(255,255,255,0.08); }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">&lt;W/&gt; Web<span>kita</span></div>
            <p style="color: #DDD6FE; font-size: 12px; margin: 6px 0 0; text-transform: uppercase; letter-spacing: 1px;">Studio Rekayasa Website Profesional</p>
        </div>

        <div class="content">
            <span class="badge-verified">PEMBAYARAN LUNAS &amp; TERVERIFIKASI</span>
            <h2 class="heading">Halo, {{ $order->customer_name }}!</h2>
            <p class="lead">
                Pembayaran untuk pesanan <strong>{{ $order->order_code }}</strong> telah berhasil diverifikasi oleh sistem Webkita. Tim kami siap memulai rekayasa visual dan pengembangan website Anda.
            </p>

            <div class="receipt-card">
                <div class="row">
                    <span class="label">KODE PESANAN</span>
                    <span class="value" style="font-family: monospace;">{{ $order->order_code }}</span>
                </div>
                <div class="row">
                    <span class="label">PAKET</span>
                    <span class="value">{{ $order->package ? $order->package->name : 'Paket Kustom' }}</span>
                </div>
                <div class="row">
                    <span class="label">STATUS ORDER</span>
                    <span class="value" style="color: #C8F169;">LUNAS (IN PROGRESS)</span>
                </div>
                <div class="row">
                    <span class="label">TOTAL INVESTASI</span>
                    <span class="value-lime">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <p style="font-size: 13px; color: #E9D5FF;">
                Langkah selanjutnya: Silakan masuk ke Dashboard Portal Klien Anda untuk melengkapi form Brief Proyek (nama bisnis, referensi desain, materi teks/foto) agar tim desainer dapat langsung mengeksekusi konsep website Anda.
            </p>

            <a href="{{ route('portal.dashboard') }}" class="btn">
                Lengkapi Brief Proyek Sekarang &rarr;
            </a>

            <a href="{{ route('portal.orders.invoice', $order->id) }}" class="btn-outline">
                Lihat &amp; Cetak Invoice Resmi
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Webkita Studio Indonesia. Butuh bantuan? WhatsApp: +62 812-3456-7890 (08.00 - 21.00 WIB).
        </div>
    </div>
</body>
</html>
