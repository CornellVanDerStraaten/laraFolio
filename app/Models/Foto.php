<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'link'];

    public function projects() {
        return $this->belongsToMany(Project::class, 'foto_project', 'image_id', 'project_id');
    }

}
