<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Komen;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi'
    ];

    public function Komen()
    {
        return $this->hasMany(Komen::class);
    }
}
