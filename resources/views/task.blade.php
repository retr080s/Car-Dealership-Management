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
                    <h1 class="text-white m-2">Add a task</h1>
                    
                    {{-- Form --}}
                        <form method="POST" action="/task" class=" dark:bg-zinc-900/50 dark:bg-gradient-to-bl from-teal-950/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/10 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                        @csrf
                            <div class="mb-4">
                            <label class="block text-white/90 font-bold mb-2" for="task">Task message</label>
                            <textarea class="bg-zinc-800 shadow appearance-none border rounded w-full py-2 px-3 text-white/90 leading-tight focus:outline-none focus:shadow-outline resize-none" maxlength="250" name="task" id="task" rows="4" placeholder="Oil change needed for ..."></textarea>
                        </div>                        
                        <button class="p-2 mt-2 rounded-xl bg-teal-700/50 text-teal-500 hover:bg-teal-700/60" type="submit">Submit</button>
                        </form>                            
                </div>
            </main>
        </div>        
    </body>
</html>
