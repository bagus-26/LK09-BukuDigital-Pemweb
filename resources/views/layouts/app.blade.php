<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 8px 30px rgba(0, 0, 0, 0.04)',
                        'hover': '0 10px 40px rgba(0, 0, 0, 0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        body { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
    </style>
</head>
<body class="bg-[#f9fafb] min-h-screen text-zinc-800 flex flex-col">

    <nav class="bg-white/80 backdrop-blur-md border-b border-zinc-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    </div>
                    <a href="{{ route('books.index') }}" class="font-extrabold text-lg text-zinc-900 tracking-tight">
                        Pustaka.
                    </a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('books.index') }}" class="text-sm font-bold text-zinc-500 hover:text-zinc-900 transition-colors">
                        Koleksi
                    </a>
                    <a href="{{ route('books.create') }}" class="bg-zinc-900 hover:bg-zinc-800 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-sm">
                        Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 mt-6">
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-800 px-4 py-3 rounded-xl text-sm flex items-center gap-3 shadow-sm" role="alert">
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <main class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-10 flex-grow w-full">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-zinc-200/80 bg-white">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-8 flex justify-between items-center">
            <p class="text-zinc-400 text-sm font-bold tracking-tight">
                &copy; {{ date('Y') }} Sistem Arsip Perpustakaan.
            </p>
            <p class="text-zinc-300 text-xs font-medium uppercase tracking-widest">
                Modern UI
            </p>
        </div>
    </footer>
</body>
</html>
