@php
    $currentLocale = app()->getLocale();
    $languages = [
        'en' => [
            'name' => 'English', 
            'flag' => 'https://flagcdn.com/w40/gb.png'
        ],
        'ms' => [
            'name' => 'Bahasa Melayu', 
            'flag' => 'https://flagcdn.com/w40/my.png'
        ],
        'id' => [
            'name' => 'Bahasa Indonesia', 
            'flag' => 'https://flagcdn.com/w40/id.png'
        ],
        'zh' => [
            'name' => '中文', 
            'flag' => 'https://flagcdn.com/w40/cn.png'
        ],
    ];
@endphp

<div class="relative inline-block text-left" x-data="{ open: false }">
    <button @click="open = !open" type="button" class="inline-flex items-center space-x-3 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 transition">
        <img src="{{ $languages[$currentLocale]['flag'] }}" alt="{{ $languages[$currentLocale]['name'] }}" class="w-5 h-4 object-cover rounded">
        <span class="text-sm font-medium text-gray-700">{{ $languages[$currentLocale]['name'] }}</span>
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-strong border border-gray-200 py-1 z-50">
        @foreach($languages as $code => $lang)
            <a href="{{ route('lang.switch', $code) }}" 
               class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-gray-100 transition {{ $currentLocale === $code ? 'bg-primary-50 text-primary-900 font-semibold' : 'text-gray-700' }}">
                <img src="{{ $lang['flag'] }}" alt="{{ $lang['name'] }}" class="w-5 h-4 object-cover rounded">
                <span>{{ $lang['name'] }}</span>
                @if($currentLocale === $code)
                    <svg class="w-4 h-4 ml-auto text-primary-900" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                @endif
            </a>
        @endforeach
    </div>
</div>
