<div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="changePassword">
        <div>
            <label>Current Password</label>
            <input type="password" wire:model.defer="current_password" class="border p-2 w-full">
            @error('current_password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label>New Password</label>
            <input type="password" wire:model.defer="new_password" class="border p-2 w-full">
            @error('new_password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label>Confirm New Password</label>
            <input type="password" wire:model.defer="new_password_confirmation" class="border p-2 w-full">
        </div><br>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white px-4 py-2 rounded">Change Password</button>
    </form>
</div>
