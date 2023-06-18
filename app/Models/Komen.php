<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;
use App\Models\User;

class Komen extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_body',
        'artikel_id',
        'user_id'
    ];

    public function Artikel()
    {
        return $this->belongsTo(Artikel::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
