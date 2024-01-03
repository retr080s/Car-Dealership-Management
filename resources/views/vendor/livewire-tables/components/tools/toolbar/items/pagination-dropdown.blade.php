@aware(['component', 'tableName'])
<div @class([
        'ml-0 ml-md-2' => $component->isBootstrap4(),
        'ms-0 ms-md-2' => $component->isBootstrap5(),
    ])
>
    <select
        wire:model.live="perPage" id="{{ $tableName }}-perPage"

        @class([
                'form-control' => $component->isBootstrap4(),
                'form-select' => $component->isBootstrap5(),
                'dark:hover:bg-teal-800 block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-teal-600 focus:ring focus:ring-teal-600 focus:ring-opacity-50 dark:bg-teal-700/50 dark:text-white dark:border-teal-800' => $component->isTailwind(),
            ])
    >
        @foreach ($component->getPerPageAccepted() as $item)
            <option
                value="{{ $item }}"
                wire:key="{{ $tableName }}-per-page-{{ $item }}"
            >
                {{ $item === -1 ? __('All') : $item }}
            </option>
        @endforeach
    </select>
</div>
