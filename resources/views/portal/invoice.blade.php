<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Resmi #{{ $order->order_code }} — Webkita Studio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,600,700,800|space-mono:400,700" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #1A0630;
            color: #FFFFFF;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }
        .invoice-card {
            background: #240B4D;
            border: 1px solid rgba(255, 255, 255, 0.15);
            max-width: 800px;
            width: 100%;
            border-radius: 24px;
            padding: 48px;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 32px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .brand-title {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .brand-accent {
            color: #C8F169;
        }
        .brand-subtitle {
            font-size: 11px;
            font-family: 'Space Mono', monospace;
            color: #DDD6FE;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 4px;
        }
        .invoice-meta {
            text-align: right;
            font-family: 'Space Mono', monospace;
            font-size: 12px;
        }
        .invoice-number {
            font-size: 18px;
            font-weight: 700;
            color: #C8F169;
            margin-bottom: 4px;
        }
        .grid-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            padding: 32px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 13px;
        }
        .info-label {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: #DDD6FE;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .info-value {
            color: #FFFFFF;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 32px 0;
            font-size: 13px;
        }
        th {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            text-transform: uppercase;
            color: #DDD6FE;
            text-align: left;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        td {
            padding: 16px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #E2E8F0;
        }
        .text-right {
            text-align: right;
        }
        .total-section {
            display: flex;
            justify-content: flex-end;
            padding-top: 16px;
        }
        .total-box {
            width: 320px;
            font-size: 13px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            color: #DDD6FE;
        }
        .grand-total {
            border-top: 2px solid #C8F169;
            margin-top: 8px;
            padding-top: 12px;
            font-size: 18px;
            font-weight: 800;
            color: #FFFFFF;
        }
        .stamp-lunas {
            display: inline-block;
            border: 2px solid #C8F169;
            color: #C8F169;
            font-family: 'Space Mono', monospace;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 16px;
        }
        .stamp-pending {
            display: inline-block;
            border: 2px solid #FBBF24;
            color: #FBBF24;
            font-family: 'Space Mono', monospace;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 16px;
        }
        .actions-bar {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 12px;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 999px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        .btn-lime {
            background: #C8F169;
            color: #1E0A38;
        }
        .btn-lime:hover {
            filter: brightness(1.1);
        }
        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        @media print {
            body {
                background: #FFFFFF;
                color: #000000;
                padding: 0;
            }
            .invoice-card {
                background: #FFFFFF;
                color: #000000;
                border: none;
                box-shadow: none;
                padding: 20px;
            }
            .brand-title, .info-value, .grand-total, td {
                color: #000000 !important;
            }
            .brand-accent, .invoice-number {
                color: #15803D !important;
            }
            .brand-subtitle, .info-label, th, .total-row {
                color: #475569 !important;
            }
            .stamp-lunas {
                border-color: #15803D !important;
                color: #15803D !important;
            }
            .actions-bar {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-card">
        <!-- Header -->
        <div class="header">
            <div>
                <div class="brand-title">Web<span class="brand-accent">kita</span></div>
                <div class="brand-subtitle">Studio Web Development & UI/UX</div>
                <div style="font-size: 11px; color: #DDD6FE; margin-top: 8px; line-height: 1.5;">
                    Republik Indonesia<br>
                    Website: webkita.id • WhatsApp: 0812-3456-7890
                </div>
            </div>

            <div class="invoice-meta">
                <div class="invoice-number">INV-{{ $order->order_code }}</div>
                <div style="color: #DDD6FE;">Tanggal Order: {{ $order->created_at->format('d M Y') }}</div>
                <div style="color: #DDD6FE; margin-top: 2px;">Jatuh Tempo: Lunas di Awal (Pre-paid)</div>
                
                @if (in_array($order->status, ['paid', 'in_progress', 'review', 'completed']))
                    <div class="stamp-lunas">LUNAS & TERVERIFIKASI</div>
                @else
                    <div class="stamp-pending">MENUNGGU PEMBAYARAN</div>
                @endif
            </div>
        </div>

        <!-- Billing Info -->
        <div class="grid-info">
            <div>
                <div class="info-label">DITAGIHKAN KEPADA:</div>
                <div class="info-value">
                    <strong>{{ $order->customer_name }}</strong><br>
                    Email: {{ $order->customer_email }}<br>
                    WhatsApp: {{ $order->customer_whatsapp }}<br>
                    Permintaan Domain: <strong>{{ $order->domain_request ?: 'Belum ditentukan' }}</strong>
                </div>
            </div>

            <div style="text-align: right;">
                <div class="info-label">DETAIL PEMBAYARAN:</div>
                <div class="info-value">
                    Metode: QRIS / Virtual Account Otomatis<br>
                    Status Sistem: <strong>{{ strtoupper($order->status) }}</strong><br>
                    ID Transaksi: {{ $order->latestPayment ? $order->latestPayment->transaction_id : ('TRX-' . $order->order_code) }}
                </div>
            </div>
        </div>

        <!-- Line Items Table -->
        <table>
            <thead>
                <tr>
                    <th style="width: 50%;">Deskripsi Layanan</th>
                    <th style="width: 15%; text-align: center;">Durasi SLA</th>
                    <th style="width: 15%; text-align: center;">Kuantitas</th>
                    <th style="width: 20%;" class="text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong style="color: #FFFFFF;">{{ $order->package ? $order->package->name : 'Paket Custom' }}</strong><br>
                        <span style="font-size: 11px; color: #DDD6FE;">
                            {{ $order->package ? $order->package->tagline : 'Pengembangan website profesional berbasis Laravel' }}
                        </span>
                        <div style="font-size: 11px; color: #C8F169; margin-top: 4px;">
                            • Termasuk Registrasi Domain Resmi (.id / .com) 1 Tahun<br>
                            • Termasuk Cloud Hosting SSD NVMe & SSL Grade A 1 Tahun<br>
                            • Garansi Pemeliharaan Pasca Rilis
                        </div>
                    </td>
                    <td style="text-align: center;">{{ $order->package ? $order->package->duration_days : 5 }} Hari Kerja</td>
                    <td style="text-align: center;">1 Proyek</td>
                    <td class="text-right" style="font-family: 'Space Mono', monospace; font-weight: 700;">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Total Calculation -->
        <div class="total-section">
            <div class="total-box">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span style="font-family: 'Space Mono', monospace;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
                <div class="total-row">
                    <span>Domain & Hosting 1 Tahun:</span>
                    <span style="color: #C8F169; font-weight: 700;">GRATIS (Rp 0)</span>
                </div>
                <div class="total-row">
                    <span>Sertifikat SSL & Setup DNS:</span>
                    <span style="color: #C8F169; font-weight: 700;">GRATIS (Rp 0)</span>
                </div>
                <div class="total-row grand-total">
                    <span>TOTAL BAYAR:</span>
                    <span style="color: #C8F169; font-family: 'Space Mono', monospace;">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Note & Compliance Footer -->
        <div style="margin-top: 32px; padding: 16px; border-radius: 12px; background: rgba(255,255,255,0.05); font-size: 11px; color: #DDD6FE; line-height: 1.6;">
            <strong>Catatan Resmi:</strong> Invoice ini adalah bukti tagihan sah dan tanda pelunasan yang diterbitkan oleh sistem Webkita Studio. Transaksi ini tunduk pada Syarat & Ketentuan Layanan Webkita serta Undang-Undang Perlindungan Data Pribadi (UU PDP No. 27 Tahun 2022).
        </div>

        <!-- Action Buttons (Hidden on Print) -->
        <div class="actions-bar">
            <a href="{{ route('portal.dashboard') }}" class="btn btn-glass">
                ← Kembali ke Portal Klien
            </a>

            <div style="display: flex; gap: 12px;">
                <button type="button" onclick="window.print()" class="btn btn-lime">
                    Cetak / Simpan PDF
                </button>
            </div>
        </div>
    </div>

</body>
</html>
