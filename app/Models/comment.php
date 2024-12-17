<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'comment_id';

    protected $fillable = ['content', 'article_id', 'user_id', 'commented_at'];

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
