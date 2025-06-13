<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'service_id',
        'short_description',
        'description',
        'images',
        'project_date',
        'client',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'project_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
