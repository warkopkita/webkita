<!-- resources/views/components/cookie-consent.blade.php -->
<div x-data="{ 
        consentGiven: localStorage.getItem('webkita_cookie_consent') === 'true',
        accept() {
            localStorage.setItem('webkita_cookie_consent', 'true');
            this.consentGiven = true;
        }
     }"
     x-show="!consentGiven"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-6"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-6"
     x-cloak
     class="fixed bottom-5 left-4 right-4 sm:left-6 sm:right-auto sm:max-w-md z-50">
    <div class="studio-card-dark p-5 rounded-2xl border border-purple-400/30 shadow-2xl backdrop-blur-xl bg-[#200A40]/95 space-y-3">
        <div class="flex items-center justify-between pb-2 border-b border-purple-500/20">
            <span class="text-[10px] font-mono font-bold text-[#C8F169] tracking-wider uppercase">KEPATUHAN UU PDP NO. 27/2022</span>
            <span class="text-[10px] text-purple-300 font-mono">PRIVASI DIGITAL</span>
        </div>
        <p class="text-xs text-purple-200/90 leading-relaxed">
            Situs Webkita menggunakan penyimpanan lokal (cookies & session) semata-mata untuk mengoptimalkan kinerja navigasi, keamanan transaksi, dan analitik performa.
        </p>
        <div class="flex items-center justify-between gap-3 pt-1">
            <a href="{{ route('legal.privacy') }}" class="text-[11px] text-purple-300 hover:text-white underline">
                Baca Kebijakan Privasi
            </a>
            <button type="button" 
                    @click="accept()" 
                    class="lime-pill px-5 py-2 rounded-xl text-xs font-black shadow-md">
                Setuju & Lanjutkan
            </button>
        </div>
    </div>
</div>
