<!-- resources/views/components/social-proof-popup.blade.php -->
<div x-data="{
        visible: false,
        currentIndex: 0,
        notifications: [
            { name: 'Ahmad S.', city: 'Surabaya', action: 'Baru saja memesan Paket Webkita Bisnis', time: '3 menit lalu', tag: 'AS' },
            { name: 'CV Pratama Logistik', city: 'Jakarta Selatan', action: 'Website Company Profile siap tayang', time: '12 menit lalu', tag: 'PL' },
            { name: 'Maya Bakery & Coffee', city: 'Bandung', action: 'Mengaktifkan Toko Online + Payment Gateway', time: '18 menit lalu', tag: 'MB' },
            { name: 'Klinik Medika Sehat', city: 'Semarang', action: 'Pemesanan Landing Page Kilat terkonfirmasi', time: '29 menit lalu', tag: 'KM' },
            { name: 'PT Solusi Mandiri', city: 'Tangerang', action: 'Mengajukan estimasi Custom Web App Laravel', time: '41 menit lalu', tag: 'SM' }
        ],
        init() {
            setTimeout(() => { this.showNext(); }, 4000);
            setInterval(() => { this.showNext(); }, 16000);
        },
        showNext() {
            this.visible = true;
            this.currentIndex = (this.currentIndex + 1) % this.notifications.length;
            setTimeout(() => { this.visible = false; }, 6000);
        }
     }"
     x-show="visible"
     x-transition:enter="transition ease-out duration-300 transform"
     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-x-[-20px]"
     x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
     x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="opacity-100 translate-y-0 sm:translate-x-0"
     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-x-[-20px]"
     x-cloak
     class="fixed bottom-6 left-6 z-40 max-w-sm w-auto hidden sm:block">
    
    <div class="studio-glass p-3.5 rounded-3xl shadow-2xl border border-purple-400/25 flex items-center gap-3.5 bg-[#260C4E]/90 backdrop-blur-xl">
        <div class="w-10 h-10 rounded-2xl bg-[#C8F169] text-[#1E0A38] font-black flex items-center justify-center text-xs shrink-0"
             x-text="notifications[currentIndex].tag">
        </div>
        <div class="text-xs">
            <div class="font-semibold text-white flex items-center gap-1.5">
                <span x-text="notifications[currentIndex].name"></span>
                <span class="text-[10px] text-purple-300 font-normal" x-text="'(' + notifications[currentIndex].city + ')'"></span>
            </div>
            <div class="text-[#C8F169] font-semibold text-[11px]" x-text="notifications[currentIndex].action"></div>
            <div class="text-[10px] text-purple-300/70 mt-0.5" x-text="notifications[currentIndex].time"></div>
        </div>
        <button @click="visible = false" class="text-purple-400 hover:text-white p-1 -mr-1">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>
