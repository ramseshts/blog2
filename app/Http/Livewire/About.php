<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    public function mount()
    {
        if (session()->missing('login')) {
            session()->flash('not-login', 'Login first!');

            return redirect('/auth/login');
        }
    }

    public function render()
    {

        return view('livewire.about')
            ->extends('layouts.app')
            ->section('content');
    }
}
