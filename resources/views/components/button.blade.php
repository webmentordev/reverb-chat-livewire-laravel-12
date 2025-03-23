<button
    {{ $attributes->merge(['class' => 'px-4 py-2 inline-block mt-3 bg-black text-white font-semibold cursor-pointer']) }}
    type="submit">{{ $slot }}</button>
