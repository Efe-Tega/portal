@php
    if (!isset($item)) {
        $item = null;
    }
@endphp

<div id="data-table-wrapper"
    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div
        class="p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $title }}</h3>
        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
            @if ($searchable)
                <input id="searchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white">
            @endif
            {{ $buttons ?? '' }}
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                <tr>
                    @foreach ($columns as $column)
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            {{ $column }}
                        </th>
                    @endforeach

                    @if ($actions)
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Actions</th>
                    @endif
                </tr>
            </thead>

            <tbody id="tableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @if ($item instanceof \Illuminate\Pagination\LengthAwarePaginator && $item->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Showing
                    <span class="font-medium text-gray-900 dark:text-white">{{ $item->firstItem() }}</span>
                    to
                    <span class="font-medium text-gray-900 dark:text-white">{{ $item->lastItem() }}</span>
                    of
                    <span class="font-medium text-gray-900 dark:text-white">{{ $item->total() }}</span>
                    students
                </div>

                {{-- Pagination Buttons --}}
                <div class="flex items-center space-x-2">
                    {{-- Previous --}}
                    @if ($item->onFirstPage())
                        <button
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg opacity-50 cursor-not-allowed"
                            disabled>
                            Previous
                        </button>
                    @else
                        <a href="{{ $item->previousPageUrl() }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($item->getUrlRange(1, $item->lastPage()) as $page => $url)
                        @if ($page == $item->currentPage())
                            <span
                                class="px-3 py-2 text-sm font-medium text-white bg-primary-600 border border-primary-600 rounded-lg">
                                {{ $page }}
                            </span>
                        @elseif ($page <= 3 || $page > $item->lastPage() - 2 || abs($item->currentPage() - $page) <= 1)
                            <a href="{{ $url }}"
                                class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                                {{ $page }}
                            </a>
                        @elseif ($page == 4 && $item->currentPage() > 4)
                            <span class="px-2 text-gray-500">...</span>
                        @elseif ($page == $item->lastPage() - 3 && $item->currentPage() < $item->lastPage() - 3)
                            <span class="px-2 text-gray-500">...</span>
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($item->hasMorePages())
                        <a href="{{ $item->nextPageUrl() }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                            Next
                        </a>
                    @else
                        <button
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg opacity-50 cursor-not-allowed"
                            disabled>
                            Next
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');

        function fetchData(url = null) {
            const baseUrl = url || "{{ route('admin.students.all_students') }}";
            const params = new URLSearchParams({
                search: searchInput?.value || '',
            });

            fetch(`${baseUrl}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    tableBody.innerHTML = data.html;
                });

        }

        // Live search with debounce
        let searchTimeout;
        searchInput?.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => fetchData(), 400);
        });
    });
</script>
