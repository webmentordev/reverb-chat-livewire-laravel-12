<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.register');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email|min:5|max:255',
            'password' => 'required|min:8|max:255|confirmed'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        session()->flash('success', 'Account has been created! Login now.');
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
        return;
    }
}
