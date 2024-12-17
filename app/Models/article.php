<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'article_id';

    protected $fillable = ['title', 'content', 'post_image', 'published_at', 'category_id'];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi ke Comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    // Relasi ke Likes
    public function likes()
    {
        return $this->hasMany(Like::class, 'article_id');
    }
}
