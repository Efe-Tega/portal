<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ $label }} @if ($required)
            *
        @endif
    </label>

    @if ($type === 'select')
        <select name="{{ $name }}" id="{{ $id ?? $name }}" {{ $required ? 'required' : '' }}
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
            <option disabled selected>{{ $placeholder }}</option>

            @php
                $opts = $options instanceof \Illuminate\Support\Collection ? $options->toArray() : $options;
                $isList = array_is_list($opts);
            @endphp

            @foreach ($opts as $key => $option)
                @php
                    $valueAttr = $isList ? strtolower($option) : $key;
                @endphp

                <option value="{{ $valueAttr }}" {{ old($name, $value) == $valueAttr ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'textarea')
        <textarea rows="3" name="{{ $name }}" {{ $required ? 'required' : '' }} placeholder="{{ $placeholder }}"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            {{ $required ? 'required' : '' }} placeholder="{{ $placeholder }}"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
    @endif

    @error($name)
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror

</div>
