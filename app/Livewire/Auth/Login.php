<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    #[Title('Login')]
    public $form = [
        'nrp'=>'',
        'password' => '',
    ];

    public function login()
    {
        // Validasi data sebelum login
        $this->validate([
            'form.nrp' => 'required',
            'form.password' => 'required|min:6',
        ]);

        // Memeriksa apakah NRP terdaftar
        $user = User::where('nrp', $this->form['nrp'])->first();
        if (!$user) {
            session()->flash('error', 'NRP tidak terdaftar.');
            return;
        }
        if (auth()->attempt(['nrp' => $this->form['nrp'], 'password' => $this->form['password']])) {
            return redirect()->route('welcome');
        } else {
            session()->flash('error', 'Password salah.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
