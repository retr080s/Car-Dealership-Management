@aware(['component', 'tableName'])

<div x-cloak x-show="!currentlyReorderingStatus"
    @class([
        'mb-3 mb-md-0 input-group' => $component->isBootstrap(),
        'flex rounded-md shadow-sm' => $component->isTailwind(),
    ])>
        <input
            wire:model{{ $component->getSearchOptions() }}="search"
            placeholder="{{ $component->getSearchPlaceholder() }}"
            type="text"
            {{ 
                $attributes->merge($component->getSearchFieldAttributes())
                ->class([
                    'block w-full border-teal-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-teal-700/50 dark:text-white dark:border-teal-700/50 rounded-none rounded-l-md focus:ring-0 focus:border-teal-700' => $component->isTailwind() && $component->hasSearch() && $component->getSearchFieldAttributes()['default'] ?? true,
                    'placeholder-white block w-full border-teal-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-teal-700/50 dark:text-white dark:border-teal-700/50 rounded-md focus:border-teal-700 focus:ring focus:ring-teal-700 focus:ring-opacity-50' => $component->isTailwind() && !$component->hasSearch() && $component->getSearchFieldAttributes()['default'] ?? true,
                    'form-control' => $component->isBootstrap() && $component->getSearchFieldAttributes()['default'] ?? true,
                ])
                ->except('default') 
            }}

        />

        @if ($component->hasSearch())
        <div @class([
                    'd-inline-flex h-100 align-items-center ' => $component->isBootstrap(),
                ])>
                <div
                    wire:click="clearSearch"

                    @class([
                            'btn btn-outline-secondary d-inline-flex h-100 align-items-center' => $component->isBootstrap(),
                            'inline-flex h-full items-center px-3 text-gray-500 bg-gray-50 rounded-r-md border border-l-0 border-gray-300 cursor-pointer sm:text-sm dark:bg-teal-800/50 dark:text-white dark:border-teal-700/50 dark:hover:bg-teal-900' => $component->isTailwind(),
                        ])
                >
                @if($component->isTailwind())
                <x-heroicon-m-x-mark class='w-4 h-4' />
                @else
                <x-heroicon-m-x-mark style='width:1em; height:1em;'  />
                @endif
                    </div>
            </div>
        @endif


</div>
