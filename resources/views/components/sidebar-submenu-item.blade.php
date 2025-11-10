@props(['route', 'label'])

<li>
    <a href="{{ route($route) }}"
        class="flex items-center space-x-2 px-4 py-2 text-sm {{ request()->routeIs($route)
            ? 'text-primary-600 dark:text-primary-400 bg-gray-50 dark:bg-gray-700/50'
            : 'text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-gray-50 dark:hover:bg-gray-700/50' }} rounded-lg">
        <span class="w-1.5 h-1.5 bg-gray-400 dark:bg-gray-500 rounded-full"></span>
        <span>{{ $label }}</span>
    </a>
</li>
