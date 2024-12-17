<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = 'likes';

    protected $primaryKey = 'like_id';

    protected $fillable = ['article_id', 'user_id'];

    // Relasi ke Article
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
