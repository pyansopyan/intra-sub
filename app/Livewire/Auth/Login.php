<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    #[Title('Login')]
    public $form = [
        'email' => '',
        'password' => '',
    ];
    public function login()
    {
        // Validasi data sebelum login
        $this->validate([
            'form.email' => 'required|email',
            'form.password' => 'required|min:6',
        ]);

        // Logika autentikasi login di sini
        // Misalnya, kamu bisa menggunakan Auth::attempt()
        if (auth()->attempt(['email' => $this->form['email'], 'password' => $this->form['password']])) {
            return redirect()->route('welcome'); // Arahkan ke halaman setelah login sukses
        } else {
            session()->flash('error', 'Email atau password salah');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
