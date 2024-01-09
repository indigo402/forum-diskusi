<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';

    protected $fillable = ['judul', 'gambar', 'content' , 'date', 'category_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'pertanyaan_id');
    }
}
