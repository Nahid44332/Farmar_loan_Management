<!-- TOPBAR -->
<header class="glass flex justify-between items-center p-5 rounded-2xl shadow">

    <div class="flex items-center gap-3">

        <button @click="sidebarOpen=true" class="lg:hidden">
            <i class="fa fa-bars text-xl"></i>
        </button>

        <div>
            <h2 class="text-2xl font-black text-slate-800">Dashboard</h2>

        </div>

    </div>

    <!-- PROFILE DROPDOWN -->
    <div x-data="{ open: false }" class="relative">

        <!-- Avatar Button -->
        <button @click="open = !open"
            class="flex items-center gap-2 focus:outline-none">

            <img src="https://i.pravatar.cc/100"
                class="w-11 h-11 rounded-xl border-2 border-emerald-400">

            <!-- dropdown arrow -->
            <i class="fa fa-chevron-down text-slate-600 text-xs"></i>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open"
             @click.away="open=false"
             x-transition
             class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-xl border overflow-hidden z-50">

            <a href="#"
               class="flex items-center gap-2 px-4 py-3 hover:bg-slate-50 text-slate-700">
                <i class="fa fa-user"></i> Profile
            </a>

            <a href="#"
               class="flex items-center gap-2 px-4 py-3 hover:bg-slate-50 text-slate-700">
                <i class="fa fa-gear"></i> Settings
            </a>

            <hr>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left flex items-center gap-2 px-4 py-3 hover:bg-red-50 text-red-500">
                    <i class="fa fa-right-from-bracket"></i> Logout
                </button>
            </form>

        </div>

    </div>

</header>
