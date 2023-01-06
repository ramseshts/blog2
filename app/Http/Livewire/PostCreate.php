<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class PostCreate extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required|min:4|unique:posts',
        'body' => 'required',
    ];

    public function mount()
    {
        if (session()->missing('login')) {
            session()->flash('not-login', 'Login first!');

            return redirect('/auth/login');
        }
    }

    public function savePost()
    {
        $this->validate();

        Post::create([
            'user_id' => session()->get('user_id'),
            'title' => $this->title,
            'body' => $this->body,
            'slug' => Str::slug(Str::limit($this->title, 20)),
        ]);

        session()->flash('success', 'Your new post has been saved.');
    }

    public function render()
    {
        return view('livewire.post-create')
            ->extends('layouts.app')
            ->section('content');
    }
}
