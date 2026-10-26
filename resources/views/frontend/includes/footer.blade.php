    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-[#1D4B6C] text-white pt-14 sm:pt-16 pb-10 border-t-4 border-[#EF7415]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Top Section: 5 Columns Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 pb-10">
                
                <!-- Col 1: Brand & About (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <!-- Logo & Brand Header -->
                    <a href="/" class="inline-flex items-center gap-3 group">
                        <div class="bg-white p-2 rounded-xl shadow-md inline-flex items-center justify-center">
                            <img src="{{ asset('logo.png') }}" alt="Heal Go Fly - Medical Value Travel" class="h-10 w-auto object-contain">
                        </div>
                        <div>
                            <span class="text-xl font-black text-white tracking-tight block">Heal Go Fly</span>
                            <span class="text-[10px] uppercase tracking-wider text-[#EF7415] font-bold block">Healgofly hi rahega</span>
                        </div>
                    </a>
                    
                    <p class="text-xs text-teal-100/80 leading-relaxed max-w-sm">
                        Heal Go Fly is your trusted medical value travel partner. We connect international and domestic patients to the best accredited hospitals and doctors worldwide with seamless care and dedicated assistance.
                    </p>
                </div>

                <!-- Col 2: Quick Links (2 cols) -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Quick Links
                    </h3>
                    <ul class="space-y-2 text-xs text-teal-100/80">
                        <li><a href="#about" class="hover:text-[#EF7415] transition-colors">About Us</a></li>
                        <li><a href="#services" class="hover:text-[#EF7415] transition-colors">Our Services</a></li>
                        <li><a href="#offices" class="hover:text-[#EF7415] transition-colors">Our Office</a></li>
                        <li><a href="#vision" class="hover:text-[#EF7415] transition-colors">Vision</a></li>
                        <li><a href="#team" class="hover:text-[#EF7415] transition-colors">Team</a></li>
                        <li><a href="#faq" class="hover:text-[#EF7415] transition-colors">FAQ</a></li>
                        <li><a href="#contact" class="hover:text-[#EF7415] transition-colors">Contact Us</a></li>
                        <li><a href="#career" class="hover:text-[#EF7415] transition-colors">Career</a></li>
                    </ul>
                </div>

                <!-- Col 3: Useful Links (2 cols) -->
                <div class="lg:col-span-2">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Useful Links
                    </h3>
                    <ul class="space-y-2 text-xs text-teal-100/80">
                        <li><a href="{{ route('hospitals') }}" class="hover:text-[#EF7415] transition-colors">Hospital Services</a></li>
                        <li><a href="#camps" class="hover:text-[#EF7415] transition-colors">OPD Camps</a></li>
                        <li><a href="{{ route('doctors') }}" class="hover:text-[#EF7415] transition-colors">Doctor Services</a></li>
                        <li><a href="{{ route('partner.login') }}" class="hover:text-[#EF7415] transition-colors">Partner Portal</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-[#EF7415] transition-colors">Admin Portal</a></li>
                        <li><a href="#privacy" class="hover:text-[#EF7415] transition-colors">Privacy Policy</a></li>
                        <li><a href="#editorial" class="hover:text-[#EF7415] transition-colors">Editorial Policy</a></li>
                        <li><a href="#terms" class="hover:text-[#EF7415] transition-colors">Terms of Use</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Us (2.5 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Contact Us
                    </h3>
                    <div class="space-y-3 text-xs text-teal-100/90">
                        <!-- WhatsApp -->
                        <a href="https://wa.me/919129846542" target="_blank" class="flex items-center gap-2 hover:text-white transition-colors">
                            <span class="w-6 h-6 rounded-full bg-[#25D366] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </span>
                            <span class="font-semibold">+91 9129846542</span>
                        </a>

                        <!-- Direct Phone / LLP Contact -->
                        <a href="tel:+919129846542" class="flex items-center gap-2 hover:text-white transition-colors">
                            <span class="w-6 h-6 rounded-full bg-[#EF7415] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <span class="font-semibold">9129846542</span>
                        </a>
                        
                        <!-- Email -->
                        <a href="mailto:info@healgofly.com" class="flex items-center gap-2 hover:text-white transition-colors">
                            <span class="w-6 h-6 rounded-full bg-[#27797D] text-white flex items-center justify-center flex-shrink-0 border border-teal-300/40">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <span>info@healgofly.com</span>
                        </a>

                        <!-- Social Media Icons -->
                        <div class="flex items-center gap-2 pt-2">
                            <!-- YouTube -->
                            <a href="#" target="_blank" class="w-7 h-7 rounded-full bg-[#FF0000] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="YouTube">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                            <!-- LinkedIn -->
                            <a href="#" target="_blank" class="w-7 h-7 rounded-full bg-[#0077b5] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="LinkedIn">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76c.94 0 1.7-.76 1.7-1.7s-.76-1.7-1.7-1.7-1.7.76-1.7 1.7.76 1.7 1.7 1.7m1.4 9.74v-8.37H5.06v8.37h2.8z"/></svg>
                            </a>
                            <!-- Facebook -->
                            <a href="#" target="_blank" class="w-7 h-7 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="Facebook">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <!-- Instagram -->
                            <a href="#" target="_blank" class="w-7 h-7 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white flex items-center justify-center hover:scale-110 transition-transform shadow-xs" title="Instagram">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 5: Our Offices (3 cols) -->
                <div class="lg:col-span-3 space-y-3.5">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-white mb-4">
                        Registered Office
                    </h3>
                    <div class="space-y-3 text-xs text-teal-100/90 leading-relaxed">
                        <div class="flex items-start gap-2.5 bg-white/5 p-3 rounded-xl border border-white/10">
                            <svg class="w-4 h-4 text-[#EF7415] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <div>
                                <strong class="text-white block font-bold mb-1">LLP Office:</strong>
                                <span>274, 2nd Floor, Satra Plaza, Palm Beach Rd, Phase 2, Sector 19D, Vashi, Navi Mumbai, Maharashtra 400703</span>
                            </div>
                        </div>
                        <p class="text-[11px] text-teal-200/80">
                            Serving domestic & international patients seeking medical procedures across India and abroad.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Middle Strip: Accreditations Badges -->
            <div class="py-6 border-t border-b border-white/15 flex items-center justify-center gap-5 sm:gap-8">
                <!-- Medical Travel Certified -->
                <div class="w-20 h-20 bg-gradient-to-b from-[#27797D] to-[#1D4B6C] rounded-lg p-2 flex flex-col justify-between text-white shadow-sm border border-teal-400/30 text-center">
                    <div class="text-[8px] font-black leading-tight uppercase tracking-tight">
                        Heal<br>Go<br>Fly
                    </div>
                    <div class="bg-[#EF7415] text-center text-[7px] font-bold py-0.5 rounded-xs uppercase tracking-tighter">
                        Facilitator
                    </div>
                </div>

                <!-- Quality Accreditation Certificate -->
                <div class="w-20 h-20 bg-white rounded-lg p-2 flex flex-col justify-between text-gray-800 shadow-sm border border-gray-200 text-center">
                    <div class="border-b border-gray-200 pb-1">
                        <span class="block text-[6px] font-black uppercase text-[#1D4B6C] tracking-tight">Accreditation</span>
                        <span class="block text-[5px] text-gray-500">Quality Certified</span>
                    </div>
                    <div class="my-auto flex items-center justify-center">
                        <div class="w-6 h-6 rounded-full bg-teal-50 border border-teal-400 flex items-center justify-center text-[#27797D]">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                    </div>
                    <div class="text-[5px] text-gray-500 font-mono font-bold">
                        NABH / JCI
                    </div>
                </div>
            </div>

            <!-- Bottom Disclaimer & Copyright -->
            <div class="pt-6 text-center space-y-3">
                <p class="text-[10px] text-teal-100/75 leading-relaxed max-w-4xl mx-auto">
                    Note: Heal Go Fly does not provide direct medical advice, diagnosis, or treatment. The services and information offered on this website are intended solely for medical facilitator assistance, travel coordination, and educational informational purposes. Heal Go Fly connects patients with certified hospitals and accredited healthcare professionals.
                </p>
                <p class="text-[11px] text-teal-100/90 font-medium">
                    &copy; Copyright {{ date('Y') }} <span class="font-bold text-white">Heal Go Fly</span>. All rights reserved. &bull; <span class="text-[#EF7415] font-semibold italic">Healgofly hi rahega</span>
                </p>
            </div>

        </div>
    </footer>
