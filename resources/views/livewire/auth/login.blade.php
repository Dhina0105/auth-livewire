<div class="max-w-md mx-auto mt-12">
    <h1 class="text-2xl mb-4">Login</h1>

    <form wire:submit.prevent="login" class="space-y-3">
        <div>
            <input type="email" wire:model.defer="email" placeholder="Email" class="w-full border px-3 py-2" />
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <input type="password" wire:model.defer="password" placeholder="Password" class="w-full border px-3 py-2" />
            @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white">Login</button>
        </div>
    </form>

    <p class="mt-4 text-sm">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600">Register</a></p>
</div>
