@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge(['class' => '
        w-full px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400
        bg-white border border-gray-200 rounded-xl
        shadow-sm
        transition-all duration-150 ease-in-out
        focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100
        disabled:bg-gray-50 disabled:text-gray-400 disabled:cursor-not-allowed disabled:border-gray-100
    ']) }}
>