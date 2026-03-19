<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'umur',
        'gender',
        'alamat',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
