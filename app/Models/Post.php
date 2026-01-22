<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;//Post::factory()を有効化(開発・テスト用のLaravelの便利機能)

    protected $fillable = [
        'user_id',
        'content',
    ];
}
