@props(['id', 'title', 'icon' => null, 'routes' => []])

@php
    $isActive = false;
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            $isActive = true;
            break;
        }
    }
@endphp

<li>
    <button
        class="w-full flex items-center justify-between px-4 py-3  rounded-lg font-medium
         {{ $isActive
             ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20'
             : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 ' }}"
        onclick="toggleSubmenu('{{ $id }}')">

        <div class="flex items-center space-x-3">
            @if ($icon)
                @includeIf('components/icons.' . $icon)
            @endif
            <span>{{ $title }}</span>
        </div>


        <svg class="w-4 h-4 transition-transform {{ $isActive ? 'rotate-180' : '' }}" id="{{ $id }}Icon"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg>
    </button>

    <ul id="{{ $id }}" class="{{ $isActive ? '' : 'hidden' }} ml-4 mt-2 space-y-1">
        {{ $slot }}
    </ul>
</li>
