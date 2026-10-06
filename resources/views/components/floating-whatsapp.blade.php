<!-- resources/views/components/floating-whatsapp.blade.php -->
<div x-data="{ open: false, hasNotification: true }" 
     class="fixed bottom-6 right-6 z-50 flex flex-col items-end">
    
    <!-- Chat Popup Box -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         @click.away="open = false"
         x-cloak
         class="w-80 sm:w-96 bg-[#240B4D] border border-purple-500/30 rounded-3xl shadow-2xl overflow-hidden mb-3">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#4A247B] to-[#34125E] px-5 py-4 text-white border-b border-purple-500/20">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-full bg-[#C8F169] text-[#1E0A38] font-black flex items-center justify-center text-sm shadow-md">
                            WK
                        </div>
                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-[#C8F169] border-2 border-[#240B4D] rounded-full"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-white">Konsultan Webkita</h4>
                        <p class="text-xs text-purple-200 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169] animate-pulse"></span>
                            Online & Siap Membantu
                        </p>
                    </div>
                </div>
                <button @click="open = false" class="text-white/70 hover:text-white p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Chat Body -->
        <div class="p-4 bg-[#1C063D]/80 space-y-3">
            <div class="bg-[#2E115B] border border-purple-500/20 rounded-2xl rounded-tl-sm p-3.5 text-xs text-purple-100 leading-relaxed shadow-sm">
                👋 Halo! Selamat datang di <strong class="text-[#C8F169]">Webkita</strong>. Butuh rekomendasi website bisnis yang cepat jadi & menghasilkan? Pilih opsi konsultasi di bawah:
            </div>

            <!-- Quick Template Actions -->
            <div class="space-y-2 pt-1">
                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20Paket%20Starter%20Landing%20Page.%20Bisa%20konsultasi%20dulu?" 
                   target="_blank" 
                   class="block w-full text-left px-3.5 py-2.5 rounded-2xl bg-[#290E54] hover:bg-[#3B1774] border border-purple-500/20 hover:border-[#C8F169]/50 text-xs text-purple-100 transition-all flex items-center justify-between group">
                    <span>🚀 Tanya Paket Landing Page Kilat</span>
                    <span class="text-[#C8F169] group-hover:translate-x-1 transition-transform">→</span>
                </a>

                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Website%20Company%20Profile%20untuk%20perusahaan/bisnis%20saya.%20Mohon%20infonya." 
                   target="_blank" 
                   class="block w-full text-left px-3.5 py-2.5 rounded-2xl bg-[#290E54] hover:bg-[#3B1774] border border-purple-500/20 hover:border-[#C8F169]/50 text-xs text-purple-100 transition-all flex items-center justify-between group">
                    <span>⭐ Konsultasi Company Profile Bisnis</span>
                    <span class="text-[#C8F169] group-hover:translate-x-1 transition-transform">→</span>
                </a>

                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Toko%20Online%20dengan%20fitur%20pembayaran%20otomatis%20QRIS%20dan%20ongkir.%20Mohon%20infonya." 
                   target="_blank" 
                   class="block w-full text-left px-3.5 py-2.5 rounded-2xl bg-[#290E54] hover:bg-[#3B1774] border border-purple-500/20 hover:border-[#C8F169]/50 text-xs text-purple-100 transition-all flex items-center justify-between group">
                    <span>🛍️ Toko Online + Payment Gateway</span>
                    <span class="text-[#C8F169] group-hover:translate-x-1 transition-transform">→</span>
                </a>

                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20membutuhkan%20Custom%20Web%20Application%20berbasis%20Laravel%20untuk%20kebutuhan%20sistem%20khusus." 
                   target="_blank" 
                   class="block w-full text-left px-3.5 py-2.5 rounded-2xl bg-[#290E54] hover:bg-[#3B1774] border border-purple-500/20 hover:border-[#C8F169]/50 text-xs text-purple-100 transition-all flex items-center justify-between group">
                    <span>⚙️ Custom Web App (Laravel)</span>
                    <span class="text-[#C8F169] group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>
        </div>

        <!-- Footer Direct Chat Button -->
        <div class="p-3 bg-[#200744] border-t border-purple-500/20">
            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20website%20bisnis." 
               target="_blank" 
               class="w-full flex items-center justify-center gap-2 py-3 px-4 lime-pill text-xs rounded-full shadow-lg shadow-[#C8F169]/25 transition-all">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/></svg>
                Mulai Chat Langsung
            </a>
        </div>
    </div>

    <!-- Toggle Button (Floating Pill) -->
    <button @click="open = !open; hasNotification = false" 
            type="button"
            class="relative flex items-center gap-2.5 lime-pill p-3.5 sm:px-6 sm:py-3.5 rounded-full shadow-2xl shadow-[#C8F169]/30 hover:scale-105 active:scale-95 transition-all duration-300">
        
        <!-- Unread Badge -->
        <span x-show="hasNotification" 
              class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-[#1E0A38] text-[10px] text-[#C8F169] font-black items-center justify-center">1</span>
        </span>

        <!-- WhatsApp Icon SVG -->
        <svg class="w-6 h-6 fill-current text-[#1E0A38]" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
        </svg>

        <span class="hidden sm:inline text-xs tracking-wider uppercase font-black">Konsultasi WhatsApp</span>
    </button>
</div>
