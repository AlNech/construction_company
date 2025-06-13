<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const PUBLISHED = 1;
    const NON_PUBLISHED = 0;

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'publish_date',
        'is_published'
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'is_published' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
