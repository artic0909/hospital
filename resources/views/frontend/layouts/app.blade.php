<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'HealGoFly - Medical Value Travel | Healgofly hi rahega')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Sans+Bengali:wght@400;500;600;700&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '"Noto Sans Bengali"', '"Tajawal"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            teal: '#27797D',
                            navy: '#1D4B6C',
                            orange: '#EF7415',
                            tealhover: '#1e5f62',
                            navyhover: '#15364e',
                            orangehover: '#d9640d'
                        },
                        vaidam: {
                            blue: '#1D4B6C',
                            darkblue: '#15364e',
                            cardblue: '#27797D',
                            red: '#EF7415',
                            redhover: '#d9640d',
                            gold: '#EF7415',
                            textdark: '#1D4B6C',
                            textmuted: '#5a6a85'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Bengali', 'Tajawal', sans-serif;
            top: 0px !important;
        }

        /* Move Google Translate Top Banner off-screen so it is completely hidden without breaking its JavaScript engine */
        .goog-te-banner-frame,
        .goog-te-banner-frame.skiptranslate,
        iframe.goog-te-banner-frame,
        iframe[class*="VIpgJd"],
        iframe[id*=":1."],
        iframe[id*=":2."],
        .VIpgJd-ZVi9od-ORHb-OEVmcd,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
        .VIpgJd-ZVi9od-xl07Ob-OEVmcd {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
            visibility: hidden !important;
            width: 0px !important;
            height: 0px !important;
            opacity: 0 !important;
            pointer-events: none !important;
            z-index: -9999 !important;
            border: none !important;
        }

        /* Prevent Google Translate from pushing body down */
        body {
            top: 0px !important;
            position: static !important;
        }

        /* Prevent Google Translate from pushing body down by 40px */
        html, body {
            top: 0px !important;
            position: static !important;
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        .goog-te-gadget {
            display: none !important;
        }
        .goog-tooltip,
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-red-500 selection:text-white">

    <!-- Google Translate Element (kept alive off-screen so Google renders the translation combo) -->
    @include('frontend.includes.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend.includes.footer')

    @stack('scripts')

    <!-- ==================== GOOGLE TRANSLATOR INITIALIZATION & INTERACTION ==================== -->
    <script type="text/javascript">
        // Google Translate Element Init callback
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn,ru,ar',
                autoDisplay: false,
                multilanguagePage: true
            }, 'google_translate_element');
        }

        const languagesMap = {
            'en': 'English',
            'bn': 'বাংলা (Bengali)',
            'ru': 'Русский (Russian)',
            'ar': 'العربية (Arabic)'
        };

        // Read Google Translate Cookie (googtrans)
        function getCookie(name) {
            const v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
            return v ? v[2] : null;
        }

        // Get currently active language
        function getCurrentLanguage() {
            const googtrans = getCookie('googtrans');
            if (googtrans) {
                const parts = googtrans.split('/');
                if (parts.length > 2 && languagesMap[parts[2]]) {
                    return parts[2];
                }
            }
            return 'en';
        }

        // Translate the whole website dynamically using Google Translate
        function translatePage(lang) {
            const cookieVal = '/en/' + lang;
            
            // Set cookie across path and host
            document.cookie = "googtrans=" + cookieVal + "; path=/;";
            try {
                if (window.location.hostname) {
                    document.cookie = "googtrans=" + cookieVal + "; domain=" + window.location.hostname + "; path=/;";
                    document.cookie = "googtrans=" + cookieVal + "; domain=." + window.location.hostname + "; path=/;";
                }
            } catch (e) {}

            // Apply RTL dynamically for Arabic
            if (lang === 'ar') {
                document.documentElement.setAttribute('dir', 'rtl');
            } else {
                document.documentElement.setAttribute('dir', 'ltr');
            }

            // Update UI text and checkmarks
            updateLanguageUI(lang);

            // Trigger Google Translate
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            } else {
                setTimeout(() => {
                    const retrySelect = document.querySelector('.goog-te-combo');
                    if (retrySelect) {
                        retrySelect.value = lang;
                        retrySelect.dispatchEvent(new Event('change'));
                    } else {
                        window.location.reload();
                    }
                }, 300);
            }
        }

        // Update active checkmarks and button label
        function updateLanguageUI(lang) {
            const currentText = document.getElementById('current-lang-text');
            if (currentText && languagesMap[lang]) {
                currentText.textContent = languagesMap[lang].split(' ')[0]; // E.g. "English", "বাংলা"
            }

            // Checkmarks
            document.querySelectorAll('[data-lang]').forEach(btn => {
                const check = btn.querySelector('.lang-check');
                if (btn.getAttribute('data-lang') === lang) {
                    btn.classList.add('bg-teal-50', 'font-bold', 'text-[#27797D]');
                    if (check) check.classList.remove('hidden');
                } else {
                    btn.classList.remove('bg-teal-50', 'font-bold', 'text-[#27797D]');
                    if (check) check.classList.add('hidden');
                }
            });

            // Set direction
            if (lang === 'ar') {
                document.documentElement.setAttribute('dir', 'rtl');
            } else {
                document.documentElement.setAttribute('dir', 'ltr');
            }
        }

        // Prevent body shift without deleting Google Translate's execution frame
        function resetBodyTop() {
            if (document.body && document.body.style.top !== '0px') {
                document.body.style.top = '0px';
                document.body.style.position = 'static';
            }
            if (document.documentElement && document.documentElement.style.top !== '0px') {
                document.documentElement.style.top = '0px';
            }
        }

        // Run UI check on load and keep body pinned to top
        document.addEventListener('DOMContentLoaded', () => {
            const currentLang = getCurrentLanguage();
            updateLanguageUI(currentLang);
            resetBodyTop();

            // Observe body style to keep top: 0px without destroying iframe communication
            const bodyObserver = new MutationObserver(() => {
                resetBodyTop();
            });

            bodyObserver.observe(document.body, {
                attributes: true,
                attributeFilter: ['style']
            });

            const interval = setInterval(resetBodyTop, 200);
            setTimeout(() => clearInterval(interval), 4000);
        });

        // Dropdown toggle
        const langBtn = document.getElementById('lang-btn');
        const langMenu = document.getElementById('lang-menu');
        const langArrow = document.getElementById('lang-arrow');
        const langWrapper = document.getElementById('lang-dropdown-wrapper');

        if (langBtn && langMenu) {
            langBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = langMenu.classList.contains('hidden');
                if (isHidden) {
                    langMenu.classList.remove('hidden');
                    langArrow.classList.add('rotate-180');
                } else {
                    langMenu.classList.add('hidden');
                    langArrow.classList.remove('rotate-180');
                }
            });

            document.addEventListener('click', (e) => {
                if (langWrapper && !langWrapper.contains(e.target)) {
                    langMenu.classList.add('hidden');
                    langArrow.classList.remove('rotate-180');
                }
            });
        }

        // Mobile Sidebar Drawer Controller (Off-Canvas)
        const sidebar = document.getElementById('mobile-sidebar');
        const backdrop = document.getElementById('mobile-sidebar-backdrop');
        const closeBtn = document.getElementById('mobile-sidebar-close-btn');
        const openBtns = document.querySelectorAll('.mobile-sidebar-toggle-btn');
        const sidebarLinks = document.querySelectorAll('.mobile-sidebar-link');

        function openSidebar() {
            if (!sidebar || !backdrop) return;
            sidebar.classList.remove('translate-x-full');
            sidebar.classList.add('translate-x-0');
            backdrop.classList.remove('opacity-0', 'pointer-events-none');
            backdrop.classList.add('opacity-100');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            if (!sidebar || !backdrop) return;
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('translate-x-full');
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        }

        openBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                openSidebar();
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeSidebar);
        }

        if (backdrop) {
            backdrop.addEventListener('click', closeSidebar);
        }

        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                closeSidebar();
            });
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });

        // News Slider Carousel Navigation
        const newsContainer = document.getElementById('news-cards-container');
        const newsPrev = document.getElementById('news-slider-prev');
        const newsNext = document.getElementById('news-slider-next');

        if (newsContainer && newsPrev && newsNext) {
            newsPrev.addEventListener('click', () => {
                const scrollAmount = newsContainer.clientWidth * 0.75;
                newsContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            newsNext.addEventListener('click', () => {
                const scrollAmount = newsContainer.clientWidth * 0.75;
                newsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }
    </script>

    <!-- Load Google Translate API Script Asynchronously -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Global Book Appointment Modal -->
    @include('frontend.includes.appointment_modal')

    <!-- Global Custom Alert Popup Modal -->
    @include('frontend.includes.custom_alert')

</body>
</html>
