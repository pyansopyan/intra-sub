<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUser extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'nrp', 'password', 'is_active', 'avatar'];
    public $timestamp = true;

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return[
            'password' => 'hashed',
        ];
    }

    public function deleteImage()
    {
        if ($this->avatar && file_exists(public_path('images/avatar/' . $this->avatar))) {
            return unlink(public_path('images/avatar/' . $this->avatar));
        }
    }

}
