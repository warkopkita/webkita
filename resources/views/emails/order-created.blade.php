<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Konfirmasi Pesanan Webkita</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #1E0A38; color: #FFFFFF; margin: 0; padding: 20px; line-height: 1.6; }
        .wrapper { max-width: 600px; margin: 0 auto; background-color: #270D52; border-radius: 16px; border: 1px solid rgba(255,255,255,0.15); overflow: hidden; }
        .header { background: linear-gradient(135deg, #451C7E, #270D52); padding: 32px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo { font-size: 24px; font-weight: 900; color: #FFFFFF; letter-spacing: -0.5px; }
        .logo span { color: #C8F169; }
        .content { padding: 32px; }
        .heading { font-size: 20px; font-weight: 800; color: #FFFFFF; margin-top: 0; margin-bottom: 12px; }
        .lead { font-size: 14px; color: #E9D5FF; margin-bottom: 24px; }
        .order-card { background-color: #1A0630; border-radius: 12px; border: 1px solid rgba(200,241,105,0.3); padding: 20px; margin-bottom: 24px; }
        .row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 13px; }
        .row:last-child { border-bottom: none; }
        .label { color: #DDD6FE; font-family: monospace; font-size: 11px; text-transform: uppercase; }
        .value { color: #FFFFFF; font-weight: bold; text-align: right; }
        .value-lime { color: #C8F169; font-weight: 900; font-family: monospace; font-size: 16px; }
        .btn { display: block; text-align: center; background-color: #C8F169; color: #1E0A38; font-weight: 800; font-size: 14px; text-decoration: none; padding: 14px 24px; border-radius: 9999px; margin-top: 24px; text-transform: uppercase; letter-spacing: 0.5px; }
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
            <h2 class="heading">Halo, {{ $order->customer_name }}!</h2>
            <p class="lead">
                Terima kasih telah mempercayakan pembuatan website bisnis Anda kepada Webkita. Pesanan Anda telah tercatat di sistem kami dengan rincian berikut:
            </p>

            <div class="order-card">
                <div class="row">
                    <span class="label">KODE PESANAN</span>
                    <span class="value" style="font-family: monospace; color: #C8F169;">{{ $order->order_code }}</span>
                </div>
                <div class="row">
                    <span class="label">PAKET LAYANAN</span>
                    <span class="value">{{ $order->package ? $order->package->name : 'Paket Kustom' }}</span>
                </div>
                @if ($order->domain_request)
                    <div class="row">
                        <span class="label">PERMINTAAN DOMAIN</span>
                        <span class="value">{{ $order->domain_request }}</span>
                    </div>
                @endif
                <div class="row">
                    <span class="label">ESTIMASI PENGERJAAN</span>
                    <span class="value">{{ $order->package ? $order->package->duration_days : 5 }} Hari Kerja</span>
                </div>
                <div class="row">
                    <span class="label">TOTAL INVESTASI</span>
                    <span class="value-lime">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <p style="font-size: 13px; color: #E9D5FF;">
                Selesaikan pembayaran untuk mengamankan antrian pengerjaan dan memulai tahap perancangan visual:
            </p>

            <a href="{{ route('checkout.payment', $order->order_code) }}" class="btn">
                Selesaikan Pembayaran Sekarang &rarr;
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Webkita Studio Indonesia. Butuh bantuan? WhatsApp: +62 812-3456-7890 (08.00 - 21.00 WIB).
        </div>
    </div>
</body>
</html>
