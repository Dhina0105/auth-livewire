<div class="max-w-md mx-auto mt-12">
    <h1 class="text-2xl mb-4">Register</h1>

    <form wire:submit.prevent="register" class="space-y-3">
        <div>
            <input type="text" wire:model.defer="name" placeholder="Name" class="w-full border px-3 py-2" />
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <input type="email" wire:model.defer="email" placeholder="Email" class="w-full border px-3 py-2" />
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <input type="password" wire:model.defer="password" placeholder="Password" class="w-full border px-3 py-2" />
            @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <input type="password" wire:model.defer="password_confirmation" placeholder="Confirm Password" class="w-full border px-3 py-2" />
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white">Register</button>
        </div>
    </form>

    <p class="mt-4 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
</div>
