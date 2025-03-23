<div class="max-w-xl bg-white rounded-3xl p-6 w-full shadow">
    <h1 class="mb-3 text-3xl text-center">Create your account!</h1>
    @session('failed')
        <x-alerts.failed :message="$value" />
    @endsession
    @session('success')
        <x-alerts.success :message="$value" />
    @endsession
    <div wire:loading wire:target="store" class="w-full">
        <x-alerts.loading message="Creating account..." />
    </div>
    <form wire:submit.prevent="store" method="post">
        <div class="mb-3">
            <x-label>Full Name</x-label>
            <x-input type="text" wire:model="name" required />
            @error('name')
                <x-alerts.error :message="$message" />
            @enderror
        </div>
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
        <div class="mb-3">
            <x-label>Confirm Password</x-label>
            <x-input type="password" wire:model="password_confirmation" required />
            @error('password_confirmation')
                <x-alerts.error :message="$message" />
            @enderror
        </div>
        <x-button>Register</x-button>
    </form>
</div>
