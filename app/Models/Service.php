<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    const IS_ACTIVE = 1;
    const NON_ACTIVE = 0;

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'sort_order',
        'is_active',
        'icon'
    ];

     protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    protected static function booted()
    {
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

}
