@props(['route', 'label', 'icon' => null])

@php
    $isActive = request()->routeIs($route);
@endphp

<li>
    <a href="{{ route($route) }}"
        class="flex items-center space-x-3 px-4 py-3 {{ $isActive
            ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20'
            : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 ' }} rounded-lg font-medium">

        @if ($icon)
            @includeIf('components/icons.' . $icon)
        @endif
        <span>{{ $label }}</span>
    </a>
</li>
