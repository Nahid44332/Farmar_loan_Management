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
    class="sidebar fixed lg:static w-72 h-screen bg-[#064e3b] text-white flex flex-col z-50 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">

    <div class="p-6 border-b border-white/10 text-center relative flex flex-col justify-center items-center">
        <h1 class="text-xl font-black tracking-tight text-white uppercase italic">AGRO LOAN AI</h1>
        <p class="text-[10px] uppercase tracking-[2px] text-emerald-400 font-bold mt-1">Smart Finance System</p>

        <button @click="sidebarOpen=false"
            class="lg:hidden absolute top-5 right-5 text-white/70 hover:text-white transition-colors focus:outline-none">
            <i class="fa fa-xmark text-xl"></i>
        </button>
    </div>

    <nav class="p-4 space-y-1.5 overflow-y-auto flex-grow custom-scrollbar">

        @php
            $navItems = [
                ['route' => 'dashboard', 'url' => 'dashboard', 'icon' => 'fa-grid-2', 'label' => 'Dashboard'],
                ['route' => 'about.section', 'url' => 'about*', 'icon' => 'fa-circle-info', 'label' => 'About'],
                ['route' => 'seba.index', 'url' => 'seba*', 'icon' => 'fa-gear', 'label' => 'Seba'],
                ['route' => 'team.index', 'url' => 'team*', 'icon' => 'fa-users', 'label' => 'Team'],
                ['route' => 'achievement.index', 'url' => 'achievement*', 'icon' => 'fa-trophy', 'label' => 'Achievement'],
                ['route' => 'why.index', 'url' => 'why*', 'icon' => 'fa-star', 'label' => 'Why Choose Us'],
            ];
        @endphp

        @foreach ($navItems as $item)
            @php
                $isActive = request()->routeIs($item['route']) || request()->is($item['url']);
            @endphp
            <a href="{{ $item['route'] == 'dashboard' ? '/dashboard' : route($item['route']) }}"
                class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group no-underline !no-underline
                {{ $isActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <div class="w-6 flex justify-center">
                    <i class="fa {{ $item['icon'] }} text-lg"></i>
                </div>
                <span class="font-medium text-[15px]">{{ $item['label'] }}</span>
            </a>
        @endforeach
<a href="{{ route('banner.section') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('banner.section') ? 'bg-[#10b981] text-white font-semibold' : 'hover:bg-emerald-800/30 hover:text-white' }}">
                <i class="fa-solid fa-images w-5 text-center text-base"></i>
                <span>Banner Section</span>
            </a>

            <a href="{{ route('counter.section') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('counter.section') ? 'bg-[#10b981] text-white font-semibold' : 'hover:bg-emerald-800/30 hover:text-white' }}">
    <i class="fa-solid fa-calculator w-5 text-center text-base"></i>
    <span>Counter Section</span>
</a>
<a href="{{ route('work.index') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('work.index') ? 'bg-[#10b981] text-white font-semibold' : 'hover:bg-emerald-800/30 hover:text-white' }}">
    <i class="fa-solid fa-blog w-5 text-center text-base"></i>
    <span>Blog</span>
</a>
        @php
            $isLoanActive = request()->is('admin/maize*') || request()->is('admin/rice*') || request()->is('admin/cow*');
        @endphp
        <div x-data="{ open: {{ $isLoanActive ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between gap-3 p-3 rounded-xl transition-all duration-300 focus:outline-none
                {{ $isLoanActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <div class="flex items-center gap-3">
                    <div class="w-6 flex justify-center"><i class="fa fa-concierge-bell text-lg"></i></div>
                    <span class="font-medium text-[15px]">Loan</span>
                </div>
                <i class="fa transition-transform duration-200 text-[10px]" :class="open ? 'rotate-180 fa-chevron-down' : 'fa-chevron-right'"></i>
            </button>

            <div x-show="open" x-transition x-cloak class="pl-4 mt-1.5 space-y-1 border-l border-white/10 ml-6">
                <div x-data="{ subOpen: {{ request()->is('admin/maize*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-2"><i class="fa fa-seedling text-emerald-400"></i> Maize</span>
                        <i class="fa text-[8px]" :class="subOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-5 space-y-0.5 text-[13px]">
                        <a href="/admin/maize" class="block p-1.5 rounded-lg {{ request()->is('admin/maize') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Add</a>
                        <a href="{{ url('admin/maize/benefit-list/1') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/maize/benefit-list*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Benefits</a>
                        <a href="{{ url('admin/maize/faq/1') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/maize/faq*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">FAQ</a>
                    </div>
                </div>

                <div x-data="{ subOpen: {{ request()->is('admin/rice*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-2"><i class="fa fa-wheat-awn text-emerald-400"></i> Rice</span>
                        <i class="fa text-[8px]" :class="subOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-5 space-y-0.5 text-[13px]">
                        <a href="{{ url('/admin/rice/2') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/rice/*') && !request()->is('admin/rice/benefit*') && !request()->is('admin/rice/faq*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Add</a>
                        <a href="{{ url('/admin/rice/benefit-list/2') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/rice/benefit-list*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Benefits</a>
                        <a href="{{ url('/admin/rice/faq/2') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/rice/faq*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">FAQ</a>
                    </div>
                </div>

                <div x-data="{ subOpen: {{ request()->is('admin/cow*') ? 'true' : 'false' }} }">
                    <button @click="subOpen = !subOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-2"><i class="fa fa-cow text-emerald-400"></i> Cow</span>
                        <i class="fa text-[8px]" :class="subOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="subOpen" x-transition class="pl-5 space-y-0.5 text-[13px]">
                        <a href="{{ url('admin/cow/3') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/cow/*') && !request()->is('admin/cow/benefit*') && !request()->is('admin/cow/faq*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Add</a>
                        <a href="{{ url('/admin/cow/benefit-list/3') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/cow/benefit-list*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">Benefits</a>
                        <a href="{{ url('/admin/cow/faq/3') }}" class="block p-1.5 rounded-lg {{ request()->is('admin/cow/faq*') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-emerald-400' }}">FAQ</a>
                    </div>
                </div>
            </div>
        </div>

        @php
            $isFarmersActive = request()->is('admin/farmers*');
        @endphp
        <div x-data="{ subOpen: {{ $isFarmersActive ? 'true' : 'false' }} }">
            <button @click="subOpen = !subOpen"
                class="w-full flex items-center justify-between p-3 rounded-xl transition-all duration-300 focus:outline-none
                {{ $isFarmersActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <div class="flex items-center gap-3">
                    <div class="w-6 flex justify-center"><i class="fa fa-user-group text-lg"></i></div>
                    <span class="font-medium text-[15px]">Farmers</span>
                </div>
                <i class="fa transition-transform duration-200 text-[10px]" :class="subOpen ? 'rotate-180 fa-chevron-down' : 'fa-chevron-right'"></i>
            </button>

            <div x-show="subOpen" x-transition x-cloak class="pl-4 mt-1.5 space-y-1 border-l border-white/10 ml-6">
                <a href="/admin/farmers"
                    class="block text-[14px] p-2 rounded-lg {{ request()->is('admin/farmers') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Membership Request</a>
                <a href="/admin/farmers/approved"
                    class="block text-[14px] p-2 rounded-lg {{ request()->is('admin/farmers/approved') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Farmer List</a>
            </div>
        </div>

        @php
            $isAgentParentActive = (request()->is('admin/investor*') || request()->is('admin/agent*')) && !request()->is('admin/farmers*');
        @endphp
        <div x-data="{ agentOpen: {{ $isAgentParentActive ? 'true' : 'false' }} }">
            <button @click="agentOpen = !agentOpen"
                class="w-full flex items-center justify-between p-3 rounded-xl transition-all duration-300 focus:outline-none
                {{ $isAgentParentActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <div class="flex items-center gap-3">
                    <div class="w-6 flex justify-center"><i class="fa fa-user-tie text-lg"></i></div>
                    <span class="font-medium text-[15px]">Agent</span>
                </div>
                <i class="fa transition-transform duration-200 text-[10px]" :class="agentOpen ? 'rotate-180 fa-chevron-down' : 'fa-chevron-right'"></i>
            </button>

            <div x-show="agentOpen" x-transition x-cloak class="pl-4 mt-1.5 space-y-1 border-l border-white/10 ml-6">
                <div x-data="{ innerOpen: {{ request()->is('admin/investor*') ? 'true' : 'false' }} }">
                    <button @click="innerOpen = !innerOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span>Investment</span>
                        <i class="fa text-[8px]" :class="innerOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="innerOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="{{ route('admin.investor.membership') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.investor.membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Membership Request</a>
                        <a href="{{ route('admin.investor.list') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.investor.list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Investor List</a>
                    </div>
                </div>
                
                <div x-data="{ innerOpen: {{ request()->is('admin/agent*') ? 'true' : 'false' }} }">
                    <button @click="innerOpen = !innerOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span>Agent</span>
                        <i class="fa text-[8px]" :class="innerOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="innerOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="/admin/agent/membership" class="block p-1.5 rounded-lg {{ request()->is('admin/agent/membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Membership Request</a>
                        <a href="/admin/agent/list" class="block p-1.5 rounded-lg {{ request()->is('admin/agent/list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Agent List</a>
                    </div>
                </div>
            </div>
        </div>

        @php
            $isPaymentActive = request()->is('admin/payment*');
        @endphp
        <div x-data="{ paymentOpen: {{ $isPaymentActive ? 'true' : 'false' }} }">
            <button @click="paymentOpen = !paymentOpen"
                class="w-full flex items-center justify-between p-3 rounded-xl transition-all duration-300 focus:outline-none
                {{ $isPaymentActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <div class="flex items-center gap-3">
                    <div class="w-6 flex justify-center"><i class="fa fa-credit-card text-lg"></i></div>
                    <span class="font-medium text-[15px]">Payments</span>
                </div>
                <i class="fa transition-transform duration-200 text-[10px]" :class="paymentOpen ? 'rotate-180 fa-chevron-down' : 'fa-chevron-right'"></i>
            </button>

            <div x-show="paymentOpen" x-transition x-cloak class="pl-4 mt-1.5 space-y-1 border-l border-white/10 ml-6">
                <div x-data="{ bkashOpen: {{ request()->is('admin/payment/bkash*') ? 'true' : 'false' }} }">
                    <button @click="bkashOpen = !bkashOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-pink-500"></span> bKash</span>
                        <i class="fa text-[8px]" :class="bkashOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="bkashOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="{{ route('admin.bkash.membership') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.bkash.membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Pending Payment</a>
                        <a href="{{ route('admin.bkash.list') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.bkash.list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Payment List</a>
                    </div>
                </div>

                <div x-data="{ nagadOpen: {{ request()->is('admin/payment/nagad*') ? 'true' : 'false' }} }">
                    <button @click="nagadOpen = !nagadOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> Nagad</span>
                        <i class="fa text-[8px]" :class="nagadOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="nagadOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="{{ route('admin.nagad.membership') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.nagad.membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Pending Payment</a>
                        <a href="{{ route('admin.nagad.list') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.nagad.list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Payment List</a>
                    </div>
                </div>

                <div x-data="{ rocketOpen: {{ request()->is('admin/payment/rocket*') ? 'true' : 'false' }} }">
                    <button @click="rocketOpen = !rocketOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span> Rocket</span>
                        <i class="fa text-[8px]" :class="rocketOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="rocketOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="{{ route('admin.rocket.membership') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.rocket.membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Pending Payment</a>
                        <a href="{{ route('admin.rocket.list') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.rocket.list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Payment List</a>
                    </div>
                </div>

                <div x-data="{ bankOpen: {{ request()->is('admin/payment/bank*') ? 'true' : 'false' }} }">
                    <button @click="bankOpen = !bankOpen" class="w-full flex items-center justify-between p-2 text-[14px] text-white/80 hover:text-white focus:outline-none">
                        <span class="flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span> Bank Transfer</span>
                        <i class="fa text-[8px]" :class="bankOpen ? 'fa-minus' : 'fa-plus'"></i>
                    </button>
                    <div x-show="bankOpen" x-transition class="pl-4 space-y-0.5 text-[13px]">
                        <a href="{{ route('admin.bank.membership') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.bank.membership') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Pending Payment</a>
                        <a href="{{ route('admin.bank.list') }}" class="block p-1.5 rounded-lg {{ request()->routeIs('admin.bank.list') ? 'text-emerald-400 font-bold' : 'text-white/60 hover:text-white' }}">Payment List</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('testimonial.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ request()->routeIs('testimonial.*') ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center"><i class="fa fa-comments text-lg"></i></div>
            <span class="font-medium text-[15px]">Testimonial</span>
        </a>

        <a href="{{ route('cta.index') }}"
            class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 no-underline !no-underline
            {{ request()->routeIs('cta.*') ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-900/30' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
            <div class="w-6 flex justify-center"><i class="fa fa-bullhorn text-lg"></i></div>
            <span class="font-medium text-[15px]">CTA Section</span>
        </a>

        @php
            $isMessagesActive = request()->is('admin/messages*');
        @endphp
        <div x-data="{ messagesOpen: {{ $isMessagesActive ? 'true' : 'false' }} }" class="space-y-1">
            <button @click="messagesOpen = !messagesOpen"
                class="w-full flex items-center justify-between p-3 rounded-xl transition-all duration-300 focus:outline-none
                {{ $isMessagesActive ? 'bg-slate-800 text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <span class="flex items-center gap-3">
                    <div class="w-6 flex justify-center relative">
                        <i class="fa fa-envelope text-lg"></i>
                        <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-rose-500 animate-pulse"></span>
                    </div>
                    <span class="font-medium text-[15px]">Contact Messages</span>
                </span>
                <div class="w-5 h-5 flex items-center justify-center rounded-md bg-white/5 text-white/50 text-[10px]">
                    <i class="fa" :class="messagesOpen ? 'fa-minus' : 'fa-plus'"></i>
                </div>
            </button>

            <div x-show="messagesOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 class="pl-4 pr-1 py-1 space-y-1">
                <a href="{{ route('admin.messages.index') }}"
                    class="flex items-center gap-2 p-2.5 rounded-lg transition-all duration-200 no-underline
                    {{ request()->routeIs('admin.messages.index') || request()->routeIs('admin.messages.show') 
                        ? 'bg-emerald-500/20 text-emerald-400 font-semibold' 
                        : 'text-white/50 hover:text-white hover:bg-white/5' }}">
                    <i class="fa fa-list-ul text-xs opacity-70"></i>
                    <span class="text-[14px]">Message List</span>
                </a>
            </div>
        </div>
        <a href="{{ route('footer.index') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('settings.*') ? 'bg-[#10b981] text-white font-semibold' : 'hover:bg-emerald-800/30 hover:text-white' }}">
    <i class="fa-solid fa-gear w-5 text-center text-base"></i>
    <span>Settings</span>
</a>
    </nav>

    <div class="p-4 mt-auto border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white py-3 rounded-xl font-bold transition-all duration-300 flex items-center justify-center gap-2 border border-red-500/20 focus:outline-none">
                <i class="fa fa-power-off"></i> Logout
            </button>
        </form>
    </div>
</aside>

<style>
    /* ১. ব্রাউজারের ডিফল্ট আন্ডারলাইন এবং ব্লু আউটলাইন রিমুভ */
    .sidebar a,
    .sidebar button {
        text-decoration: none !important;
        outline: none !important;
    }

    /* ২. একটিভ ও হোভার কালার স্ট্যাবিলিটি */
    .sidebar a:hover,
    .sidebar button:hover {
        color: #ffffff !important;
    }

    /* ৩. x-cloak ফ্লিকারিং প্রোটেকশন */
    [x-cloak] {
        display: none !important;
    }

    /* ৪. স্লিম কাস্টম স্ক্রলবার */
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

    /* ৫. টেক্সট-এরিয়ার স্ক্রলবার এবং রিসাইজ হ্যান্ডেল হাইড করার গ্লোবাল রুল */
    textarea {
        resize: none !important;
    }
    textarea::-webkit-inner-spin-button,
    textarea::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>