@props(['active'])

@php
$classes = ($active ?? false)
    ? 'flex items-center gap-2.5 w-full ps-3 pe-4 py-2.5 border-l-2 border-blue-500 text-start text-sm font-semibold text-blue-700 bg-blue-50 focus:outline-none transition-all duration-150 ease-in-out rounded-r-lg'
    : 'flex items-center gap-2.5 w-full ps-3 pe-4 py-2.5 border-l-2 border-transparent text-start text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-900 focus:bg-gray-50 focus:border-gray-300 transition-all duration-150 ease-in-out rounded-r-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>