<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'demo_url',
        'repository_url',
        'technologies'
    ];

    protected $casts = [
        'technologies' => 'array'
    ];

}
