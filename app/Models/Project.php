<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'problem',
        'solution',
        'tech_stack',
        'category',
        'live_url',
        'github_url',
        'image',
        'download_file',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
