<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class PostEdit extends Component
{
    public $post;

    public $title;
    public $body;
    public $postId;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required',
    ];

    public function mount($slug)
    {
        if (session()->missing('login')) {
            session()->flash('not-login', 'Login first!');

            return redirect('/auth/login');
        }

        $this->post = Post::where('slug', $slug)->first();
        $this->title = $this->post->title;
        $this->body = $this->post->body;
        $this->postId = $this->post->id;
    }

    public function edit()
    {
        $this->validate();

        Post::updateOrInsert(
            ['id' => $this->postId, 
                'title' => $this->title,
            ],
            ['title' => $this->title,
                'body' => $this->body,
                'slug' => Str::slug(Str::limit($this->title, 20))
            ]
        );

        session()->flash('success', 'Your post has been edited.');

        return redirect("/post/my/");
    }
    
    public function render()
    {
        return view('livewire.post-edit')
            ->extends('layouts.app')
            ->section('content');
    }
}
