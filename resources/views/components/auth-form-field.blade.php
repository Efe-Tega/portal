<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-200 mb-2']) }}>{{ $label }}
    @if ($required)
        *
    @endif
</label>

@if ($type == 'password')
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            {{ $slot }}
        </div>
        <input id="{{ $name }}_input" type="password" name="{{ $name }}" placeholder="{{ $placeholder }}"
            {{ $attributes->merge([
                'class' =>
                    'block w-full pl-10 pr-12 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all',
            ]) }}
            {{ $required ? 'required' : '' }}>

        <button type="button" id="{{ $name }}_toggle" class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <svg id="{{ $name }}_eyeOpen" class="w-5 h-5 text-gray-400 hover:text-gray-300" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
            </svg>
            <svg id="{{ $name }}_eyeClosed" class="w-5 h-5 text-gray-400 hover:text-gray-300 hidden"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                </path>
            </svg>
        </button>
    </div>
@else
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            {{ $slot }}
        </div>

        <input
            {{ $attributes->merge([
                'id' => $attributes->get('id'),
                'type' => $type,
                'name' => $name,
                'value' => old($name, $value),
                'placeholder' => $placeholder,
                'class' =>
                    'block w-full pl-10 pr-3 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all',
            ]) }}
            {{ $required ? 'required' : '' }}>
    </div>
@endif
