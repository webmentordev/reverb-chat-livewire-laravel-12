<section class="w-full flex flex-col" x-data="{ chat: false, email: '{{ auth()->user()->email }}' }" x-init="Echo.channel('message')
    .listen('MessageCreated', (e) => {
        if (email != e.email) {
            document.getElementById('audio').play()
        }
    });">
    <div class="overflow-hidden rounded-lg h-[340px] w-full bg-white/10 my-2">
        <audio id="audio" src="{{ asset('sounds/message.mp3') }}" allow="autoplay" class="hidden"></audio>
        <div class="p-3 overflow-y-scroll h-full">
            <div class="space-y-2 sm:[overflow-anchor:none]">
                @forelse ($chatMessages as $message)
                    <div class="flex items-center {{ $message->user->id == auth()->user()->id ? 'justify-end' : '' }}"
                        x-transition>
                        <div
                            class="{{ $message->user->id == auth()->user()->id ? 'auth' : 'user' }} sm:[overflow-anchor:none] flex flex-col w-full">
                            <strong class="text-[10px]">{{ $message->user->name }}</strong>

                            @if ($message->image)
                                <a href="{{ asset('storage/' . $message->image) }}" target="_blank"><img
                                        class="my-1 rounded-lg" src="{{ asset('storage/' . $message->image) }}"></a>
                            @endif
                            <span class="text-md mb-1 break-words w-full">{{ $message->message }}</span>
                            <strong
                                class="text-[10px] {{ $message->user->id == auth()->user()->id ? 'text-start' : 'text-end' }}">{{ $message->created_at->format('h:i A') }}</strong>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-white">No messages exist!</p>
                @endforelse
            </div>
            @if ($image)
                <div class="flex justify-end w-full">
                    <div class="flex flex-col items-end justify-end">
                        <img class="opacity-35 w-[50px] object-contain" src="{{ $image->temporaryUrl() }}">
                        <span class="text-white text-[9px]">Selected image</span>
                    </div>
                </div>
            @endif
            @error('image')
                <x-alerts.error class="text-[10px] text-end" :message="$message" />
            @enderror
            <div class="sm:[overflow-anchor:auto] h-px" x-init="$el.scrollIntoView()"></div>
        </div>
    </div>
    <div class="flex items-center">
        <input type="text" wire:model="message" placeholder="Write message..."
            class="w-full resize-none focus:outline-none placeholder:text-white/30 text-sm text-white bg-white/20 p-2 rounded-lg
            @error('message') border border-red-500 @enderror"
            @keydown.enter="$wire.send()">
        <label for="image" class="ml-2 mr-1 cursor-pointer">
            <img src="https://api.iconify.design/iconoir:attachment.svg?color=%23f2f2f2" alt="send icon" width="23">
        </label>
        <input type="file" id="image" wire:model="image" class="hidden" accept="image/*">
        <button wire:click="send" class="cursor-pointer ml-2">
            <img src="https://api.iconify.design/material-symbols-light:send-rounded.svg?color=%23ffffff"
                alt="send icon" width="30">
        </button>
    </div>
</section>
