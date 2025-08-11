<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Posts extends Component
{
    public $content;
    public $is_public = true;

    protected $rules = [
        'content' => 'required|min:3',
        'is_public' => 'boolean',
    ];

    public function createPost()
    {
        $this->validate();

        Post::create([
            'user_id' => Auth::id(),
            'content' => $this->content,
            'is_public' => $this->is_public,
        ]);

        $this->reset('content', 'is_public');
        session()->flash('success', 'Post created successfully!');
    }

    public function render()
    {
        $posts = Post::where(function($q) {
            $q->where('is_public', true)
              ->orWhere('user_id', Auth::id());
        })
        ->latest()
        ->get();

        return view('livewire.posts', ['posts' => $posts]);
    }
}

