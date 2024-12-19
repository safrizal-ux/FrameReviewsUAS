<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmarks';

    protected $primaryKey = 'bookmark_id';

    protected $fillable = [
        'user_id',
        'article_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Article
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}

