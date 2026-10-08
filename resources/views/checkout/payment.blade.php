@extends('layouts.app')

@section('title', 'Instruksi Pembayaran ' . $order->order_code . ' — Webkita')
@section('meta_description', 'Selesaikan pembayaran pesanan website Webkita untuk segera memulai tahap perancangan desain.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-8">
        
        <!-- Header Frame -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-10 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">INVOICE RESMI #{{ $order->order_code }}</span>
                    <h1 class="text-2xl sm:text-3xl font-black text-white mt-1">
                        Menunggu Pembayaran
                    </h1>
                    <p class="text-xs text-purple-200 mt-1">
                        Pesanan atas nama <strong>{{ $order->customer_name }}</strong> ({{ $order->customer_email }})
                    </p>
                </div>

                <div class="bg-[#1A0630] border border-purple-500/30 rounded-2xl p-4 text-right">
                    <span class="text-[11px] text-purple-300 block">Total yang Harus Dibayar:</span>
                    <span class="text-2xl sm:text-3xl font-black text-[#C8F169] block mt-0.5">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] text-amber-300 font-bold uppercase tracking-wider">Status: Belum Terbayar</span>
                </div>
            </div>
        </div>

        <!-- Payment Channels Container -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            
            <!-- Left: Payment Options & QRIS/VA Box -->
            <div class="md:col-span-7 space-y-6">
                
                <!-- QRIS & Bank Transfer Details -->
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-400/20 shadow-2xl space-y-6">
                    <div>
                        <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">METODE PEMBAYARAN</span>
                        <h3 class="text-lg font-bold text-white mt-1">Pilih Kanal Pembayaran Anda</h3>
                    </div>

                    <!-- Channel 1: QRIS Instan -->
                    <div class="p-5 rounded-2xl bg-[#1A0630] border border-purple-500/30 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-white">QRIS Otomatis (Semua Bank & Dompet Digital)</span>
                            <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-[#C8F169] text-[#1E0A38]">INSTAN</span>
                        </div>
                        <p class="text-[11px] text-purple-300">
                            Buka aplikasi BCA Mobile, Livin by Mandiri, BRImo, GoPay, OVO, ShopeePay, atau DANA, lalu transfer sesuai nominal tepat.
                        </p>
                        
                        <div class="p-4 rounded-xl bg-white text-center inline-block w-full">
                            <div class="font-mono text-xs text-gray-800 font-bold pb-2 border-b border-gray-200">
                                QRIS STANDAR PEMBAYARAN NASIONAL
                            </div>
                            <div class="py-6 flex flex-col items-center justify-center">
                                <div class="w-44 h-44 border-4 border-gray-900 rounded-lg p-2 flex flex-col items-center justify-center space-y-2 bg-gray-50">
                                    <div class="text-[10px] font-black text-gray-900 tracking-widest uppercase">WEBKITA STUDIO</div>
                                    <div class="w-28 h-28 border-2 border-dashed border-gray-700 flex items-center justify-center text-center p-2">
                                        <span class="text-[9px] font-mono text-gray-700 font-bold">QRIS CODE<br>{{ $order->order_code }}</span>
                                    </div>
                                    <div class="text-[9px] font-mono text-gray-600 font-semibold">NMID: ID102026889201</div>
                                </div>
                            </div>
                            <div class="font-mono text-xs text-gray-900 font-bold">
                                Nominal: Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Channel 2: Virtual Account & Rekening Resmi -->
                    <div class="p-5 rounded-2xl bg-[#1A0630] border border-purple-500/30 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-white">Transfer Virtual Account / Bank Resmi</span>
                            <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-white/10 text-purple-200">24 JAM</span>
                        </div>

                        <div class="space-y-3 text-xs">
                            <div class="p-3 rounded-xl bg-[#200A40] border border-purple-500/20 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] font-mono text-purple-400 block">BANK BCA (KODE 014)</span>
                                    <strong class="text-white text-sm font-mono tracking-wider">8820-1928-3746-10</strong>
                                    <span class="text-[11px] text-purple-300 block">a.n. Webkita Digital Studio</span>
                                </div>
                                <span class="text-[10px] text-[#C8F169] font-bold">Verifikasi 1 Menit</span>
                            </div>

                            <div class="p-3 rounded-xl bg-[#200A40] border border-purple-500/20 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] font-mono text-purple-400 block">BANK MANDIRI (KODE 008)</span>
                                    <strong class="text-white text-sm font-mono tracking-wider">137-00-1928374-2</strong>
                                    <span class="text-[11px] text-purple-300 block">a.n. Webkita Digital Studio</span>
                                </div>
                                <span class="text-[10px] text-[#C8F169] font-bold">Verifikasi 1 Menit</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Right: Action & Instant Verification -->
            <div class="md:col-span-5 space-y-6">
                
                <!-- Fast Simulation / Direct Verification Card -->
                <div class="relative rounded-3xl p-1 bg-gradient-to-b from-[#C8F169] via-emerald-400 to-[#5B21B6] shadow-2xl">
                    <div class="bg-[#240B4D] p-6 sm:p-8 rounded-[22px] space-y-5">
                        <div>
                            <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">VERIFIKASI SISTEM</span>
                            <h3 class="text-lg font-bold text-white mt-1">Uji Coba Pembayaran Langsung</h3>
                            <p class="text-xs text-purple-200/90 mt-1 leading-relaxed">
                                Fitur simulasi instan ini disediakan untuk mendemonstrasikan sistem alur pengerjaan otomatis Webkita secara langsung tanpa perlu kartu kredit riil.
                            </p>
                        </div>

                        <form action="{{ route('checkout.simulate', $order->order_code) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="lime-pill w-full py-4 rounded-xl text-center text-xs font-black shadow-lg shadow-[#C8F169]/30 hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                                <span>Simulasi Pembayaran Berhasil (Uji Coba)</span>
                                <span>→</span>
                            </button>
                        </form>

                        <div class="pt-4 border-t border-purple-500/20 space-y-3">
                            <span class="text-[11px] font-bold text-white block">Atau Konfirmasi Manual Melalui Admin:</span>
                            <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20sudah%20melakukan%20pembayaran%20untuk%20pesanan%20nomor%20{{ $order->order_code }}%20senilai%20Rp%20{{ number_format($order->total_price, 0, ',', '.') }}." 
                               target="_blank" 
                               class="glass-pill block w-full py-3 rounded-xl text-center text-xs font-bold text-white hover:text-[#C8F169]">
                                Kirim Bukti Transfer ke WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Order Detail Summary Card -->
                <div class="studio-card-dark p-6 rounded-3xl border border-purple-400/20 space-y-4 text-xs">
                    <span class="font-mono font-bold text-purple-300 uppercase tracking-wider block">INFORMASI PESANAN</span>
                    <div class="flex justify-between border-b border-purple-500/20 pb-2">
                        <span class="text-purple-300">Nomor Pesanan:</span>
                        <span class="font-mono font-bold text-white">{{ $order->order_code }}</span>
                    </div>
                    <div class="flex justify-between border-b border-purple-500/20 pb-2">
                        <span class="text-purple-300">Paket Layanan:</span>
                        <span class="font-bold text-white">{{ $order->package ? $order->package->name : 'Layanan Kustom' }}</span>
                    </div>
                    @if ($order->domain_request)
                        <div class="flex justify-between border-b border-purple-500/20 pb-2">
                            <span class="text-purple-300">Domain Diminta:</span>
                            <span class="text-[#C8F169] font-mono">{{ $order->domain_request }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-purple-300">Waktu Order:</span>
                        <span class="text-white">{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
