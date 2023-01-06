<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $username;
    public $password;
    public $password2;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'username' => 'required|unique:users',
        'password' => 'required',
        'password2' => 'required|same:password'
    ];


    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // return redirect()->to('/');
        session()->flash('message', "You are Registered successfully!");

        return redirect('/auth/login');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.app')
            ->section('content');
    }
}
