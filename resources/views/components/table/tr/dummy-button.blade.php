<button {{ $attributes->merge(['type' => 'button', 'class' => 'py-1.5 px-1.5 inline-flex justify-center items-center gap-2 rounded-full align-middle disabled:opacity-50 disabled:pointer-events-none text-sm', 'style' => 'pointer-events: none;']) }}>
    {{ $slot }}
</button>
