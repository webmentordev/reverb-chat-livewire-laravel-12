<section x-data="{ open: true }" class="fixed bottom-5 right-5 z-40">
    <button class="bg-black p-3 rounded-full cursor-pointer" @click="open = !open" x-show="!open">
        <img src="https://api.iconify.design/mdi:chat-processing.svg?color=%23ffffff" alt="Chat Icon" width="20">
    </button>
    <div class="absolute w-[350px] h-[450px] bg-black shadow-2xl bottom-2 right-2 rounded-lg p-2"
        :class="open ? '' : 'hidden'" x-cloak x-transition>
        <div class="flex flex-col">
            <div class="flex items-center justify-between bg-white/10 px-2 py-1 rounded-lg">
                <h1 class="text-white text-lg">{{ auth()->user() ? auth()->user()->name : config('app.name') }}</h1>
                <div class="bg-indigo-600 rounded-full p-1 cursor-pointer" @click="open = false">
                    <img src="https://api.iconify.design/ic:twotone-close.svg?color=%23ffffff" alt="Close">
                </div>
            </div>
            @livewire('chatbox')
        </div>
    </div>
</section>
