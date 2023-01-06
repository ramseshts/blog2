<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $user = User::where('username', $this->username)->first();
        // dd(Hash::check($this->password, $hashed->password));


        if (User::where('username', $this->username)->first()) {
            if (Hash::check($this->password, $user->password)) {
                // information
                session()->flash('message', 'You are Login successful');
                
                // login session
                session()->put('login', 'true');
                session()->put('name', $user->name);
                session()->put('user_id', $user->id);

                return redirect('/');
            }
            else {
                session()->flash('error', 'email and password are wrong.');
            }
        }
        else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function logout()
    {
        session()->flush();

        return redirect('/auth/login');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.app')
            ->section('content');
    }
}
