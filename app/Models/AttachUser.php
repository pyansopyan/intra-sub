<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'projects_id',
    ];

    public $timestamp = true;

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'projects_id');
    }
}
