<div>
    @if (session()->has('success'))
        <div class="bg-green-200 p-2 mb-2">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="createPost">
        <textarea wire:model="content" placeholder="What's on your mind?" class="border p-2 w-full"></textarea>
        @error('content') <span class="text-red-500">{{ $message }}</span> @enderror

        <label class="block mt-2">
            <input type="checkbox" wire:model="is_public"> Public post
        </label>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Post</button>
    </form>

    <hr class="my-4">

    <h2 class="text-lg font-bold mb-2">Posts</h2>
    @foreach($posts as $post)
        <div class="border p-2 mb-2">
            <p>{{ $post->content }}</p>
            <small>
                Posted by {{ $post->user->name }} —
                {{ $post->is_public ? 'Public' : 'Private' }}
            </small>
        </div>
    @endforeach
</div>
