<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Delivery SRL</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-gradient-to-b from-[#1a3a5a] to-[#2c5282] min-h-screen text-white">

<header class="w-full px-10 py-6 flex justify-between items-center bg-black/10 backdrop-blur-sm fixed top-0 z-50">
    
    <div class="text-2xl font-extrabold flex items-center gap-2">
        <span class="text-green-400">📦</span> 
        Fast Delivery 
        <span class="text-orange-500 text-sm">SRL</span>
    </div>

    @if (Route::has('login'))
        <nav class="flex items-center gap-4">
            
            @auth
                <a href="{{ url('/dashboard') }}" 
                   class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-bold transition shadow-lg">
                   Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="text-white hover:text-orange-400 font-medium transition">
                   Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg font-bold transition shadow-lg text-white">
                       Înregistrare
                    </a>
                @endif

            @endauth

        </nav>
    @endif

</header>

<main class="pt-32 pb-20">

    <div class="container mx-auto px-6 lg:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <div class="space-y-8">

            <h1 class="text-5xl lg:text-6xl font-black leading-tight drop-shadow-md">
                Gestionează-ți <br>
                Livrările <span class="text-green-400 italic">Rapid</span> <br>
                și Simplu!
            </h1>

            <p class="text-lg text-blue-100 max-w-md">
                Platformă web de gestionare a livrărilor de colete pentru afacerea ta.
                Siguranță și viteză la fiecare AWB.
            </p>

            <div class="bg-white/10 p-2 rounded-2xl backdrop-blur-md border border-white/20 shadow-2xl max-w-xl">

                <form action="#" method="GET" class="flex flex-col sm:flex-row gap-2">

                    <input
                        type="text"
                        placeholder="Introdu codul AWB pentru tracking..."
                        class="flex-1 p-4 rounded-xl text-gray-800 focus:ring-4 focus:ring-green-400 outline-none transition font-medium"
                    >

                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-600 px-10 py-4 rounded-xl font-black text-lg transition shadow-[0_4px_15px_rgba(34,197,94,0.4)]"
                    >
                        URMĂREȘTE
                    </button>

                </form>

            </div>

        </div>

        <div class="hidden lg:flex justify-center relative">

            <div class="absolute inset-0 bg-blue-500/20 blur-3xl rounded-full"></div>

            <img
                src="https://images.unsplash.com/photo-1586769852044-692d6e3703a0?q=80&w=600&auto=format&fit=crop"
                alt="Delivery"
                class="relative z-10 rounded-3xl shadow-2xl border-8 border-white/5 transform hover:-rotate-2 transition duration-500"
            >

        </div>

    </div>

    <div class="container mx-auto px-6 lg:px-20 mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="group bg-gradient-to-br from-green-500 to-green-700 p-8 rounded-3xl shadow-2xl hover:-translate-y-2 transition duration-300">

            <div class="text-4xl mb-4">📤</div>

            <h3 class="text-2xl font-bold mb-4">Trimite Colete</h3>

            <p class="text-green-100 mb-6 text-sm">
                Calculează prețul instant și plasează o comandă nouă în câteva secunde.
            </p>

            <div class="flex flex-col gap-3">

                <button class="bg-white/20 hover:bg-white/40 py-2 rounded-xl font-bold border border-white/30 transition">
                    Estimare Preț
                </button>

                <button class="bg-white text-green-700 py-3 rounded-xl font-black hover:bg-gray-100 transition shadow-lg">
                    Plasare Comandă
                </button>

            </div>

        </div>

        <div class="group bg-gradient-to-br from-blue-500 to-blue-700 p-8 rounded-3xl shadow-2xl hover:-translate-y-2 transition duration-300">

            <div class="text-4xl mb-4">🗺️</div>

            <h3 class="text-2xl font-bold mb-4">Servicii & Rețea</h3>

            <p class="text-blue-100 mb-6 text-sm">
                Descoperă acoperirea noastră națională și punctele de ridicare de proximitate.
            </p>

            <button class="w-full bg-blue-800/40 hover:bg-blue-800/60 py-3 rounded-xl font-bold border border-blue-400/30 transition">
                Vezi hartă puncte
            </button>

        </div>

        <div class="group bg-gradient-to-br from-orange-500 to-orange-700 p-8 rounded-3xl shadow-2xl hover:-translate-y-2 transition duration-300">

            <div class="text-4xl mb-4">👤</div>

            <h3 class="text-2xl font-bold mb-4">Administrează Cont</h3>

            <p class="text-orange-100 mb-6 text-sm">
                Accesează istoricul livrărilor tale, facturile și rapoartele de activitate.
            </p>

            <a
                href="{{ route('login') }}"
                class="block w-full bg-white text-orange-700 py-3 rounded-xl font-black text-center hover:bg-gray-100 transition shadow-lg"
            >
                Intră în Cont
            </a>

        </div>

    </div>

</main>

<footer class="text-center py-10 text-white/40 text-sm border-t border-white/10">
    <p>&copy; 2026 Fast Delivery SRL - Proiect Licență. Toate drepturile rezervate.</p>
</footer>

</body>
</html>