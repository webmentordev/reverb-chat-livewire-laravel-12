<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function store(Request $request)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('failed', 'Email & Password are wrong!');
            return;
        }
        $request->session()->regenerate();
        $this->reset(['email', 'password']);
        return $this->redirectRoute('home');
    }
}
