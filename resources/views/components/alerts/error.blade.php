@props(['message'])
<p {{ $attributes->merge(['class' => 'text-red-600 mt-1']) }}>{{ $message }}</p>
