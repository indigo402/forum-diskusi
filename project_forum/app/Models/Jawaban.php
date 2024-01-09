<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';

    protected $fillable = ['content', 'date', 'user_id' , 'pertanyaan_id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
