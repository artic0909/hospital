<header class="sticky top-0 z-30 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
    <div class="px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center justify-between gap-4">
            
            <!-- Left: Mobile Menu Toggle & Title -->
            <div class="flex items-center gap-3">
                <!-- Mobile Sidebar Button -->
                <button 
                    type="button" 
                    onclick="toggleAgentSidebar()"
                    class="lg:hidden p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition-colors"
                    aria-label="Open Sidebar Menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Partner Portal Brand Title -->
                <div class="flex items-center gap-2.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#EF7415] animate-ping"></span>
                    <div>
                        <h1 class="text-base sm:text-lg font-extrabold text-[#112347] tracking-tight flex items-center gap-2">
                            <span>Partner Desk</span>
                            <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-black uppercase tracking-wider bg-teal-50 text-[#27797D] border border-teal-200">
                                Referral Partner
                            </span>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Right: Fast Actions & Profile -->
            <div class="flex items-center gap-2.5 sm:gap-4">
                
                <!-- Quick Search Input -->
                <form action="{{ route('agent.patient.index') }}" method="GET" class="hidden md:block relative w-56 lg:w-64">
                    <input 
                        type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search patient, phone..." 
                        class="w-full bg-slate-100 hover:bg-slate-50 focus:bg-white text-xs text-slate-800 placeholder-slate-400 rounded-xl pl-9 pr-4 py-2 border border-slate-200 focus:border-[#27797D] focus:ring-2 focus:ring-[#27797D]/20 focus:outline-none transition-all"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>

                <!-- Fast-Track Add Patient CTA -->
                <a 
                    href="{{ route('agent.patient.create') }}" 
                    class="inline-flex items-center gap-1.5 bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-3 sm:px-4 py-2 rounded-xl shadow-sm hover:shadow transition-all duration-150 transform hover:-translate-y-0.5"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span><span class="hidden sm:inline">Add</span> Patient</span>
                </a>

                <!-- Referral Partner Profile Pill -->
                @auth('agent')
                    @php $currentAgent = auth('agent')->user(); @endphp
                    <div class="flex items-center gap-2.5 pl-2 border-l border-slate-200">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#1D4B6C] to-[#27797D] text-white flex items-center justify-center font-bold text-xs shadow-xs shrink-0">
                            {{ strtoupper(substr($currentAgent->name, 0, 1)) }}
                        </div>
                        <div class="hidden md:block text-left leading-tight">
                            <span class="block text-xs font-bold text-[#112347]">
                                {{ Str::limit($currentAgent->name, 16) }}
                            </span>
                            <span class="block text-[10px] font-mono font-semibold text-amber-600">
                                {{ $currentAgent->agent_code }}
                            </span>
                        </div>
                        
                        <!-- Logout Icon Button -->
                        <form action="{{ route('agent.logout') }}" method="POST" class="inline">
                            @csrf
                            <button 
                                type="submit" 
                                title="Sign Out" 
                                class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endauth

            </div>

        </div>
    </div>
</header>

