<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-2 bg-blue-600 rounded-lg font-semibold text-white text-sm sm:text-base']) }}>
    {{ $slot }}
</button>
