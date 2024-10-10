<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;


class Login extends Component
{
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
