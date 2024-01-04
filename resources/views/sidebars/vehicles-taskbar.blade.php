@include('important-components.header')

<div class="min-h-screen flex">
    <aside class="bg-zinc-800 text-white/90 sticky top-0 flex-shrink-0 w-64 border-r border-teal-700/50">
        <nav class="px-4 py-4 flex flex-col space-y-4">
            @include('important-components.sidebar-links')
        </nav>
    </aside>
    <main class="flex flex-wrap">
        <div class=" mt-8 mx-auto p-6 lg:p-8">
            <h1 class="text-white m-2">Vehicles page</h1>
            <a href="/add-vehicle">
                <button class="p-2 mt-2 rounded-xl bg-teal-700/50 text-teal-500 hover:bg-teal-700/60">Add a vehicle</button>
            </a>
            <div class="mt-4">
                <livewire:vehiclesTable />
            </div>
        </div>
    </main>
</div>

@livewireScripts