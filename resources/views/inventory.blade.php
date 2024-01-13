<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('important-components.header')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif
    <body class="bg-zinc-950">
        <div class="min-h-screen flex">
            <aside class="bg-zinc-900 text-white/90 sticky top-0 flex-shrink-0 w-64 border-r border-teal-700/50">
                <nav class="px-4 py-4 flex flex-col space-y-4">
                    @include('important-components.sidebar-links')
                    
                </nav>
            </aside>
            <main class="">
                <div class="max-w-7xl mt-8 mx-auto p-6 lg:p-8 ">
                    <h1 class="text-white m-2">Inventory management</h1>
                    <a href="/inventory/vehicle-location">
                        <button class="p-2 mt-2 rounded-xl bg-teal-700/50 text-teal-500 hover:bg-teal-700/60">Change vehicle location</button>
                    </a>   
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 lg:gap-8">
                        @foreach ($invinfo as $i)
                            
                        <div class="mt-4 scale-100 p-6 dark:bg-zinc-900/50 dark:bg-gradient-to-bl from-teal-950/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/10 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-teal-950/50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-teal-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                                
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $i->currentLocation }}</h2>
                                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                                Lot Number: {{ $i->lotNumber }}
                                            </p>
                                            
                                            {{-- Form for deleting the task --}}
                                            <form action="{{ route('delete-inventory', [$i->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 mt-2 rounded-xl bg-red-900/20 text-red-600 hover:bg-red-900/30">Delete</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                
                                
                        </div>            
                </div>
            </main>
        </div>        
    </body>
</html>
