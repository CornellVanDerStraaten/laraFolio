<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FotoLocation extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'project_id', 'image_id'];



}
