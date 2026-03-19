<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Delivery SRL</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-[#e2f3f0] min-h-screen text-slate-800">
    
    <header class="w-full px-10 py-6 flex justify-between items-center bg-[#ccece6] shadow-md fixed top- top-0 z-50 border-b border-emerald-100">
        <div class="text-2xl font-extrabold flex items-center gap-2 text-slate-800">
            <span class="text-emerald-600 text-3xl">📦</span> Fast Delivery <span class="text-orange-400 text-sm italic font-medium">SRL</span>
        </div>

        @if (Route::has('login'))
            <nav class="flex items-center gap-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-indigo-400 hover:bg-indigo-500 px-6 py-2 rounded-lg font-bold transition text-white shadow-md text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-emerald-600 font-semibold transition text-sm">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg font-bold transition text-white shadow-md text-sm">Înregistrare</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="pt-40 pb-20">
        <div class="container mx-auto px-6 lg:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-8">
                <h1 class="text-5xl lg:text-6xl font-black leading-tight tracking-tight text-slate-950">
                    Gestioneaza-ti livrarile <br> <span class="text-emerald-600 italic">Rapid</span> și <span class="text-emerald-500 italic">Simplu!</span>
                </h1>
                
                <div class="bg-white p-2 rounded-2xl border border-emerald-100 shadow-xl max-w-xl">
                    <form action="#" method="GET" class="flex flex-col sm:flex-row gap-2">
                        <input type="text" placeholder="Introdu codul AWB pentru tracking..." class="flex-1 p-4 rounded-xl bg-slate-50 text-gray-800 outline-none font-medium border border-slate-100 focus:border-emerald-300">
                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 px-8 py-4 rounded-xl font-black text-lg transition text-white shadow-lg">URMĂREȘTE</button>
                    </form>
                </div>
            </div>

            <div class="hidden lg:flex justify-center relative">
                <img src="/images/imagine_de_fundal3.png" 
                     alt="Livrare Colete" 
                     onerror="this.style.display='none'; document.getElementById('image-error').style.display='block';"
                     class="rounded-[2.5rem] shadow-2xl border-8 border-white w-full max-w-md object-cover transform -rotate-1">
                <div id="image-error" class="hidden bg-emerald-100 text-emerald-800 p-6 rounded-2xl text-center font-medium border border-emerald-200">
                    ❌ Imaginea nu s-a putut încărca. <br> Verifică dacă fișierul <br> `public/images/imagine_de_fundal3.jpg` există.
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 lg:px-20 mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-[#b9e4dc] p-8 rounded-[2rem] shadow-lg border border-white/40 flex flex-col justify-between min-h-[350px]">
                <div>
                    <div class="text-4xl mb-4">📤</div>
                    <h3 class="text-2xl font-bold mb-2 text-emerald-900">Trimite Colete</h3>
                    <p class="text-emerald-800/70 mb-8 text-sm leading-relaxed">Calculează prețul instant și plasează o comandă nouă.</p>
                </div>
                <div class="flex gap-2 mt-auto">
                    <button class="flex-1 bg-white/40 hover:bg-white/60 py-3 rounded-xl font-bold border border-white/20 transition text-emerald-900 text-xs">Estimare Preț</button>
                    <button class="flex-1 bg-emerald-500 text-white py-3 rounded-xl font-black hover:bg-emerald-600 transition text-xs shadow-md">Plasare Comandă</button>
                </div>
            </div>

            <div class="bg-[#ccd3f2] p-8 rounded-[2rem] shadow-lg border border-white/40 flex flex-col justify-between min-h-[350px]">
                <div>
                    <div class="text-4xl mb-4">🗺️</div>
                    <h3 class="text-2xl font-bold mb-2 text-indigo-900">Servicii & Rețea</h3>
                    <p class="text-indigo-800/70 mb-8 text-sm leading-relaxed h-10">Descoperă acoperirea națională și punctele de ridicare.</p>
                </div>
                <button class="w-full bg-indigo-500 text-white py-4 rounded-xl font-bold shadow-md hover:bg-indigo-600 transition text-sm mt-auto">Vezi hartă puncte</button>
            </div>

            <div class="bg-[#9ae208] p-8 rounded-[2rem] shadow-lg border border-white/40 flex flex-col justify-between min-h-[350px]">
                <div>
                    <div class="text-4xl mb-4 text-orange-600/60">👤</div>
                    <h3 class="text-2xl font-bold mb-2 text-orange-950/80">Contul tău</h3>
                    <p class="text-orange-900/60 mb-8 text-sm leading-relaxed h-10">Accesează istoricul livrărilor tale, facturile și rapoartele.</p>
                </div>
                <a href="{{ route('login') }}" class="block w-full bg-orange-400 text-white py-4 rounded-xl font-black text-center shadow-md hover:bg-orange-500 transition text-sm mt-auto uppercase tracking-wide">Intră în Cont</a>
            </div>

        </div>
    </main>

    <footer class="text-center py-12 text-slate-400 text-xs font-medium border-t border-emerald-100">
        <p>&copy; 2026 Fast Delivery SRL - Proiect Licență.</p>
    </footer>
</body>
</html>