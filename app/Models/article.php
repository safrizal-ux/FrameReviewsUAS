<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan HasFactory jika menggunakan Factory
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory; // Optional, tambahkan jika Anda menggunakan Factory

    protected $table = 'articles';

    protected $primaryKey = 'article_id';

    protected $fillable = ['title', 'content', 'category_id', 'published_at', 'user_id', 'post_image'];


    /**
     * Relasi ke Kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Relasi ke Komentar
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'article_id');
    }

    /**
     * Relasi ke Likes
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'article_id', 'article_id');
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi ke Bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'article_id');
    }

    // Relasi melalui Bookmark untuk mendapatkan pengguna yang menandai artikel
    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'article_id', 'user_id');
    }

}

