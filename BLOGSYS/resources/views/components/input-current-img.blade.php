@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 mb-2']) }}>Current Image</label><img src="{{ $value }}" {{ $attributes->merge(['class'=>'max-h-[150px] mb-4']) }} alt="{{ $value }}">
