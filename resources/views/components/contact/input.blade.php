@props(['disabled' => false])

<input value="{{ old($attributes->get('name')) }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-800 col-span-3']) !!}>
