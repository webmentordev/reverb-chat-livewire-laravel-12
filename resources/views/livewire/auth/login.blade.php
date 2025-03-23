<div class="max-w-xl bg-white rounded-3xl p-6 w-full shadow">
    <h1 class="mb-3 text-3xl text-center">Login your account!</h1>
    @session('failed')
        <x-alerts.failed :message="$value" />
    @endsession
    @session('success')
        <x-alerts.success :message="$value" />
    @endsession
    <div wire:loading wire:target="store" class="w-full">
        <x-alerts.loading />
    </div>
    <form wire:submit.prevent="store" method="post">
        <div class="mb-3">
            <x-label>Email Address</x-label>
            <x-input type="email" wire:model="email" required />
            @error('email')
                <x-alerts.error :message="$message" />
            @enderror
        </div>
        <div class="mb-3">
            <x-label>Password</x-label>
            <x-input type="password" wire:model="password" required />
            @error('password')
                <x-alerts.error :message="$message" />
            @enderror
        </div>
        <x-button>Submit</x-button>
    </form>
</div>
