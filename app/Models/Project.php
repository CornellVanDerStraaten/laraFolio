<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'keywords',
        'live_link',
        'github_link',
        'slug',
        'content',
        'active',
        'published_date',
        'thumbnail_image'
    ];

    /**
     * Make route model binding use slugs, not Primary Keys
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
