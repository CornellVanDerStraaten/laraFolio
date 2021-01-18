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
        'thumbnail_image',
        'developers',
        'vormgevers',
        'taal'
    ];

    /**
     * Make route model binding use slugs, not Primary Keys
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The images that belong to projects.
     */
    public function images() {
        return $this->belongsToMany(Foto::class, 'foto_project', 'project_id', 'image_id');
    }


}
