<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as BlogPost;

class Post extends Component
{
    public $post;

    public function mount($slug)
    {
        if (session()->missing('login')) {
            session()->flash('not-login', 'Login first!');

            return redirect('/auth/login');
        }

        $this->post = BlogPost::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.post')
            ->extends('layouts.app')
            ->section('content');
    }
}
