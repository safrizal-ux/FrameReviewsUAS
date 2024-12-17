<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';  // Menentukan tabel yang digunakan model ini

    protected $primaryKey = 'role_id';  // Mengoverride primary key default Laravel

    protected $fillable = ['name'];
}
