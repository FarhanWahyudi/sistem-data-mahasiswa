@props([
    'disabled' => false,
    'placeholder' => ''
])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:ring-0 focus:border-blue-500 rounded-md text-sm sm:text-base', 'placeholder' => $placeholder]) }}>
