
@props(['value'])
<label {{ $attributes->merge(['class' => 'text-gray-500 font-bold mb-1 md:mb-0 mr-2 whitespace-nowrap']) }}>
    {{ $value ?? $slot }}
</label>
