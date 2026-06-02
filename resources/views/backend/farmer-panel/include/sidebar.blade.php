<div x-show="sidebarOpen" x-cloak @click="sidebarOpen=false" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" 
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" 
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" 
    class="fixed inset-0 bg-black/60 z-40 lg:hidden backdrop-blur-sm">
</div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="sidebar fixed top-0 left-0 lg:static w-72 h-screen bg-[#064e3b] text-white flex flex-col z-50 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">

    <div class="p-6 border-b border-white/10 text-center relative flex flex-col justify-center items-center h-20">
        <h1 class="text-xl font-black tracking-tight text-white uppercase italic">AGRO LOAN AI</h1>
        <p class="text-[10px] uppercase tracking-[2px] text-emerald-400 font-bold mt-1">Farmer Dashboard</p>

        <button @click="sidebarOpen=false"
            class="lg:hidden absolute top-6 right-6 text-white/70 hover:text-white transition-colors focus:outline-none">
            <i class="fa fa-xmark text-xl"></i>
        </button>
    </div>

    <nav class="p-4 space-y-2 overflow-y-auto flex-grow custom-scrollbar">

        @php
            $isDashboardActive = request()->routeIs('farmer.dashboard') || request()->is('farmer/dashboard');
        @endphp
        <a href="{{ route('farmer.dashboard') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group no-underline !no-underline
            {{ $isDashboardActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center">
                <i class="fa fa-grid-2 text-lg"></i>
            </div>
            <span class="font-medium text-[15px]">ড্যাশবোর্ড</span>
        </a>

        @php
            $isProfileActive = request()->is('farmer/profile*');
        @endphp
        <a href="/farmer/profile"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ $isProfileActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center">
                <i class="fa fa-user text-lg"></i>
            </div>
            <span class="font-medium text-[15px]">প্রোফাইল</span>
        </a>

        @php
            $isLoanActive = request()->is('farmer/loan*') || request()->is('farmer/apply*');
        @endphp
        <a href="/farmer/loan"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ $isLoanActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center">
                <i class="fa fa-hand-holding-dollar text-lg"></i>
            </div>
            <span class="font-medium text-[15px]">লোন</span>
        </a>

        @php
            $isPaymentActive = request()->is('farmer/payments*');
        @endphp
        <a href="/farmer/payments"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ $isPaymentActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center">
                <i class="fa fa-credit-card text-lg"></i>
            </div>
            <span class="font-medium text-[15px]">কিস্তি ও লেনদেন</span>
        </a>

        @php
            $isSettingsActive = request()->is('farmer/settings*');
        @endphp
        <a href="/farmer/settings"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ $isSettingsActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center">
                <i class="fa fa-gear text-lg"></i>
            </div>
            <span class="font-medium text-[15px]">সেটিং</span>
        </a>

    </nav>

    <div class="p-4 mt-auto border-t border-white/10">
        <form action="{{ route('farmer.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white py-3 rounded-xl font-bold transition-all duration-300 flex items-center justify-center gap-2 border border-red-500/20 focus:outline-none">
                <i class="fa fa-power-off"></i> লগআউট
            </button>
        </form>
    </div>
</aside>

<style>
    .sidebar a,
    .sidebar button {
        text-decoration: none !important;
        outline: none !important;
    }

    .sidebar a:hover,
    .sidebar button:hover {
        color: #ffffff !important;
    }

    [x-cloak] {
        display: none !important;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }
</style>