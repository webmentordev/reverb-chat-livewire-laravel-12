<nav class="fixed top-0 left-0 bg-black z-50 w-full">
    <div class="max-w-7xl m-auto p-2 text-white">
        <ul class="flex items-center">
            @auth
                <a href="{{ route('home') }}" class="mr-6" wire:navigate>Home</a>
                <a href="{{ route('page.1') }}" class="mr-6" wire:navigate>Page 1</a>
                <a href="{{ route('page.2') }}" class="mr-6" wire:navigate>Page 2</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-white">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="mr-6" wire:navigate>Login</a>
                <a href="{{ route('register') }}" wire:navigate>Register</a>
            @endguest
        </ul>
    </div>
</nav>
