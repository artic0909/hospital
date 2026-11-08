<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Agent Portal - Heal Go Fly')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with typography & forms plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            teal: '#27797D',
                            navy: '#1D4B6C',
                            darknavy: '#112347',
                            orange: '#EF7415',
                            tealhover: '#1e5f62',
                            navyhover: '#15364e',
                            orangehover: '#d9640d'
                        }
                    }
                }
            }
        }
    </script>

    <!-- ApexCharts Library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- SweetAlert2 CDN for Confirmation Dialogs & Flash Toasts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Custom scrollbar for dashboard */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    @stack('styles')
</head>
<body class="h-full bg-slate-50 text-slate-800 antialiased font-sans">

    <div class="min-h-full flex flex-col">

        <!-- ==================== SIDEBAR COMPONENT ==================== -->
        @include('agent.includes.sidebar')

        <!-- ==================== MAIN CONTENT WRAPPER ==================== -->
        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">

            <!-- Top Header Bar -->
            @include('agent.includes.header')

            <!-- Main Content Container -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>

            <!-- Bottom Footer Note -->
            <footer class="py-4 px-6 border-t border-slate-200/80 bg-white/70 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} <strong>Heal Go Fly</strong> &bull; Medical Tourism & Healthcare Facilitation Network. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- Mobile Sidebar JavaScript Toggle -->
    <script>
        function toggleAgentSidebar() {
            const sidebar = document.getElementById('agent-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            if (!sidebar) return;
            const isClosed = sidebar.classList.contains('-translate-x-full');
            if (isClosed) {
                sidebar.classList.remove('-translate-x-full');
                if (backdrop) backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                if (backdrop) backdrop.classList.add('hidden');
            }
        }

        // SweetAlert2 Flash Notification Handler
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                timer: 3500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Notice',
                text: "{{ session('error') }}",
                confirmButtonColor: '#27797D'
            });
        @endif

        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Attention',
                text: "{{ session('warning') }}",
                confirmButtonColor: '#EF7415'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Errors',
                html: '<ul class="text-left text-xs space-y-1">@foreach($errors->all() as $err)<li>• {{ addslashes($err) }}</li>@endforeach</ul>',
                confirmButtonColor: '#27797D'
            });
        @endif
    </script>

    @stack('scripts')
</body>
</html>

