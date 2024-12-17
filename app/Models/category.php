<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = ['name', 'description'];

    // Relasi ke Articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
