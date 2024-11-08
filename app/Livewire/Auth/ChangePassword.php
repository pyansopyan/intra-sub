<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ChangePassword extends Component
{
    public $old_password;
    public $new_password;
    public $new_password_confirmation;

    public function updatePassword()
    {
        // Validasi input
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ], [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai.',
            'new_password.min' => 'Password baru minimal 6 karakter.',
        ]);

        $user = Auth::user();

        // Verifikasi apakah password lama benar
        if (!Hash::check($this->old_password, $user->password)) {
            throw ValidationException::withMessages(['old_password' => 'Password lama tidak sesuai.']);
        }

        // Update password baru
        $user->password = Hash::make($this->new_password);
        $user->save();

        // Reset field setelah berhasil
        $this->reset(['old_password', 'new_password', 'new_password_confirmation']);

        // Memberikan pesan sukses
        session()->flash('message', 'Password berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.auth.changepassword');
    }
}
