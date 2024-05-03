<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    public $showLoginView = true;
    public $name, $email, $password, $passwordConfirm;
    public $loginEmail, $loginPassword;
    public $remember=false;
    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'min:5|same:passwordConfirm'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        session()->flash('message', 'regester was successfully');
    }
    public function login()
    {
        $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'min:5'
        ]);

        // $user = User::where('email', $this->loginEmail)->first();
        if (auth()->attempt(['email'=>$this->loginEmail,'password'=>$this->loginPassword],$this->remember)) {
            return to_route('home');
        }

        // return back()->withErrors([
        //     'password' => 'The provided credentials are invalid.',
        // ]);
        $this->addError('message','The provided credentials are invalid.');
    }
    public function showRegister() {
        $this->showLoginView=false;
    }
    public function render()
    {
        return view('livewire.auth.index')->extends('layouts.app')->section('content');
    }
}
