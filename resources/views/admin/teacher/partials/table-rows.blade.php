@foreach ($teachers as $index => $teacher)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">{{ $teachers->firstItem() + $index }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $teacher->name }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $teacher->email }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">English Language</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"
            data-assigned-ids="{{ $teacher->classes->pluck('id')->join(',') }}"
            data-assigned-names="{{ $teacher->classes->pluck('name')->join(', ') }}">

            <div class="flex flex-col gap-1">
                @if ($teacher->classes->isEmpty())
                    <span class="text-xs text-gray-500">None</span>
                @else
                    @foreach ($teacher->classes as $c)
                        <div
                            class="inline-flex items-center justify-between border bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-200 rounded-md px-2 gap-2">
                            <span class="text-sm">{{ $c->name }}</span>

                            <form
                                action="{{ route('admin.unassign.class', ['teacher' => $teacher->id, 'class' => $c->id]) }}"
                                method="POST"
                                onsubmit="return confirm('Unassign {{ addslashes($c->name) }} from {{ addslashes($teacher->name) }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs px-1 py-0.5 rounded-md hover:text-red-500">
                                    &times;
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">B.Ed., PGDE</td>
        <td class="px-6 py-4 whitespace-nowrap"><span
                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">Active</span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
            <button class="text-primary-600 dark:text-primary-400 hover:text-primary-900">View</button>
            <button class="text-gray-600 dark:text-gray-400 hover:text-gray-900">Edit</button>
            <button class="assign-btn text-emerald-600 dark:text-emerald-400 hover:text-emerald-900 font-medium"
                data-teacher-id="TCHR/2015/0042">
                Assign
            </button>
        </td>
    </tr>
@endforeach
