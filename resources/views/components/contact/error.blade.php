@props(['messages'])

@if ($messages)
<div class="flex items-center">
</div>
<div class="flex items-center col-span-3">
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif


