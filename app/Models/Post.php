<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'user_name',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
