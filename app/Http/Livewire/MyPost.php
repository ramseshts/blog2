<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class MyPost extends Component
{
    public $posts;

    // public $id;
    // public $title;
    // public $body;
    // public $slug;

    public function mount()
    {
        if (session()->missing('login')) {
            session()->flash('not-login', 'Login first!');

            return redirect('/auth/login');
        }

        $this->posts = Post::join('users', 'users.id', 'posts.user_id')
                        ->where('user_id', session('user_id'))->get();

        // dd($query);
        
    }

    public function delete($slug)
    {
        Post::where('slug', $slug)->delete();
    }
    
    public function render()
    {
        return view('livewire.my-post')
            ->extends('layouts.app')
            ->section('content');
    }
}
