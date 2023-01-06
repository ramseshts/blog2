<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts;

    public function mount()
    {
        // if (session()->missing('login')) {
        //     session()->flash('not-login', 'Login first!');

        //     return redirect('/auth/login');
        // }

        $this->posts = Post::join('users', 'users.id', 'posts.user_id')->get();
    }

    public function render()
    {
        return view('livewire.home')
            ->extends('layouts.app')
            ->section('content');
    }
}
