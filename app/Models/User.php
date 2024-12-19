<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio', // Pastikan kolom 'bio' ada dalam tabel users
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [ // Ubah dari method ke properti
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke Artikel
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id', 'id'); // pastikan key-nya benar
    }

    // Relasi ke Bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    // Relasi melalui Bookmark untuk mendapatkan artikel yang di-bookmark
    public function bookmarkedArticles()
    {
        return $this->belongsToMany(Article::class, 'bookmarks', 'user_id', 'article_id');
    }

}

