<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
