<?php
namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $is_active;
    public $avatar;

    public function mount()
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Inisialisasi properti dengan data pengguna
        $this->name = $user->name;
        $this->email = $user->email;
        $this->avatar = $user->avatar; // Ambil avatar yang sudah ada, tapi tidak di-upload ulang
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'avatar' => 'nullable|max:1024|mimes:jpeg,png,jpg', // Avatar opsional
        ]);

        $user = auth()->user();

        // Update data profil
        $user->name = $this->name;
        $user->email = $this->email;


        // Hanya update avatar jika ada gambar baru yang diunggah
        if ($this->avatar) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                $oldAvatarPath = storage_path('app/public/avatars/' . $user->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            // Simpan avatar baru dengan nama unik berdasarkan hash
            $avatarName = $this->avatar->hashName(); // Nama file unik berdasarkan hash
            $this->avatar->storeAs('avatars', $avatarName, 'public'); // Simpan di folder storage/app/public/avatars
            $user->avatar = $avatarName; // Set nama avatar pada user
        }

        // Simpan semua perubahan user
        $user->save();

        // Set pesan sukses untuk pengguna
        session()->flash('message', 'Update Profile Successfully.');

        // Redirect kembali ke halaman edit profil
        return redirect()->route('profile.edit');
    }

    public function render()
    {
        return view('livewire.pages.user.editprofile');
    }
}
