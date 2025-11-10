@foreach ($students as $index => $student)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">{{ $students->firstItem() + $index }}</td>
        <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900 dark:text-white">
                {{ $student->lastname }} {{ $student->middlename }} {{ $student->firstname }}
            </div>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->email ?? '' }}</div>
        </td>
        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-mono">{{ $student->registration_number }}</td>
        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $student->class->name }}</td>
        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $student->gender ?? '' }}</td>
        <td class="px-6 py-4">
            <span
                class="px-3 py-1 text-xs font-medium text-green-700 dark:text-green-400 bg-green-100 dark:bg-green-900/30 rounded-full">
                Active
            </span>
        </td>
        <td class="px-6 py-4">
            <div class="flex items-center space-x-2">
                <a href="student-profile.html?id=2024-SS2-0385"
                    class="p-2 text-primary-600 dark:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg transition-colors"
                    title="View Profile">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </a>
                <button
                    class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors"
                    title="Edit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </button>
                <button
                    class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                    title="Delete">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </div>
        </td>
    </tr>
@endforeach
