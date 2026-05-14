<div x-show="sidebarOpen" x-cloak @click="sidebarOpen=false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 z-40 lg:hidden">
</div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="sidebar fixed lg:static w-72 h-screen bg-[#064e3b] text-white flex flex-col z-50 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">

    <div class="p-6 border-b border-white/10 text-center relative">
        <h1 class="text-xl font-black tracking-tight">AGRO LOAN AI</h1>
        <p class="text-xs text-white/50">Smart Finance System</p>

        <button @click="sidebarOpen=false" class="lg:hidden absolute top-5 right-5 text-white/70 hover:text-white">
            <i class="fa fa-xmark text-xl"></i>
        </button>
    </div>

    <nav class="p-4 space-y-2 overflow-y-auto flex-grow custom-scrollbar">

        <a href="/dashboard"
            class="flex items-center gap-3 p-3 rounded-xl transition
           {{ request()->is('dashboard') ? 'bg-emerald-500 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5' }}">
            <i class="fa fa-grid-2 w-5"></i> Dashboard
        </a>

        <a href="{{ route('about.section') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition no-underline
   {{ request()->routeIs('about.section') ? 'bg-emerald-500 text-white shadow-lg' : 'text-white/70 hover:bg-white/10' }}">
            <i class="fa fa-circle-info"></i> About
        </a>

        <a href="{{ route('team.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition no-underline
           {{ request()->routeIs('team.*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
            <i class="fa fa-users"></i> Team
        </a>


        <a href="{{ route('achievement.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition no-underline
           {{ request()->routeIs('achievement.*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
            <i class="fa fa-trophy"></i> Achievement
        </a>

        <a href="{{ route('why.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition no-underline
           {{ request()->routeIs('why.*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
            <i class="fa fa-star"></i> Why Choose Us
        </a>

        <div x-data="{ open: {{ request()->is('services*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between gap-3 p-3 rounded-xl transition 
                {{ request()->is('services*') ? 'bg-emerald-500 text-white shadow-lg' : 'text-white/70 hover:text-white hover:bg-white/5' }}">
                <div class="flex items-center gap-3">
                    <i class="fa fa-concierge-bell w-5"></i>
                    <span>Loan</span>
                </div>
                <i class="fa transition-transform duration-200"
                    :class="open ? 'rotate-180 fa-chevron-down' : 'fa-chevron-right'" style="font-size: 10px;">
                </i>
            </button>

            <div x-show="open" x-transition x-cloak class="pl-6 mt-3 space-y-2 border-l border-white/10 ml-5">
                <div x-data="{ subOpen: {{ request()->is('admin/maize*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen"
                        class="w-full flex items-center justify-between p-2 rounded-lg transition text-white/70 hover:text-white">
                        <div class="flex items-center gap-2">
                            <i class="fa fa-seedling"></i> <span>Maize</span>
                        </div>
                        <i class="fa" :class="subOpen ? 'fa-minus' : 'fa-plus'" style="font-size: 8px;"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-6 mt-1 space-y-1">
                        <a href="/admin/maize" class="block text-sm p-2 rounded-lg hover:text-emerald-400">Add</a>
                        <a href="{{ url('admin/maize/benefit-list/1') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">Benefits</a>
                        <a href="{{ url('admin/maize/faq/1') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">FAQ</a>
                    </div>
                </div>
                <div x-data="{ subOpen: {{ request()->is('admin/rice*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen"
                        class="w-full flex items-center justify-between p-2 rounded-lg transition text-white/70 hover:text-white">
                        <div class="flex items-center gap-2">
                            <i class="fa fa-wheat-awn"></i> <span>Rice</span>
                        </div>
                        <i class="fa" :class="subOpen ? 'fa-minus' : 'fa-plus'" style="font-size: 8px;"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-6 mt-1 space-y-1">
                        <a href="{{ url('/admin/rice/2') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">Add</a>
                        <a href="{{ url('/admin/rice/benefit-list/2') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">Benefits</a>
                        <a href="{{ url('/admin/rice/faq/2') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">FAQ</a>
                    </div>
                </div>

                <div x-data="{ subOpen: {{ request()->is('admin/cow*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen"
                        class="w-full flex items-center justify-between p-2 rounded-lg transition text-white/70 hover:text-white">
                        <div class="flex items-center gap-2">
                            <i class="fa fa-cow"></i> <span>Cow</span>
                        </div>
                        <i class="fa" :class="subOpen ? 'fa-minus' : 'fa-plus'" style="font-size: 8px;"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-6 mt-1 space-y-1">
                        <a href="{{ url('admin/cow/3') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">Add</a>
                        <a href="{{ url('/admin/cow/benefit-list/3') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">Benefits</a>
                        <a href="{{ url('/admin/cow/faq/3') }}"
                            class="block text-sm p-2 rounded-lg hover:text-emerald-400">FAQ</a>
                    </div>
                </div>
            </div>

        </div>

        <div x-data="{ subOpen: {{ request()->is('admin/farmers*') ? 'true' : 'false' }} }">
            <button @click="subOpen = !subOpen"
                class="w-full flex items-center justify-between p-3 rounded-xl transition no-underline
                {{ request()->is('admin/farmers*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <i class="fa fa-user-group"></i> <span>Farmers</span>
                </div>
                <i class="fa" :class="subOpen ? 'fa-minus' : 'fa-plus'" style="font-size: 10px;"></i>
            </button>
            <div x-show="subOpen" x-transition class="pl-6 mt-2 space-y-1 border-l border-white/10 ml-4">
                <a href="/admin/farmers"
                    class="block text-sm p-2 rounded-lg no-underline {{ request()->is('admin/farmers') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Membership
                    Request</a>
                <a href="/admin/farmers/approved"
                    class="block text-sm p-2 rounded-lg no-underline {{ request()->is('admin/farmers/approved') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Farmer
                    List</a>
            </div>
        </div>

        <a href="{{ route('testimonial.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition no-underline
           {{ request()->routeIs('testimonial.*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
            <i class="fa fa-comments"></i> Testimonial
        </a>

          <a href="{{ route('cta.index') }}"
           class="flex items-center gap-3 p-3 rounded-xl transition no-underline
           {{ request()->routeIs('cta.*') ? 'bg-emerald-500 text-white shadow-lg font-bold' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
            <i class="fa fa-bullhorn"></i> CTA Section
        </a>
    
    </nav>

    <div class="p-4 mt-auto border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full bg-red-500/20 hover:bg-red-500 text-red-500 hover:text-white py-3 rounded-xl font-bold transition duration-300 flex items-center justify-center gap-2">
                <i class="fa fa-power-off"></i> Logout
            </button>
        </form>
    </div>
</aside>

<style>
    /* Alpine.js cloak prevent flicker */
    [x-cloak] {
        display: none !important;
    }

    /* Custom Thin Scrollbar for Sidebar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 3px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    /* Sidebar BG color matching your theme */
    .sidebar {
        background-color: #064e3b;
    }
</style>
