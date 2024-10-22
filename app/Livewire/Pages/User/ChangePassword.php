<?php

namespace App\Livewire\Pages\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Cek apakah password lama sesuai
        if (!Hash::check($this->old_password, Auth::user()->password)) {
            throw ValidationException::withMessages(['old_password' => 'Password lama tidak sesuai.']);
        }

        // Update password
        $user = Auth::user(); // Ambil data user yang sedang login
        $user->password = Hash::make($this->new_password); // Hash password baru
        $user->save(); // Simpan perubahan ke database

        // Reset field setelah berhasil
        $this->reset(['old_password', 'new_password', 'new_password_confirmation']);

        // Memberikan pesan sukses
        session()->flash('message', 'Password berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.pages.user.changepassword');
    }
}
