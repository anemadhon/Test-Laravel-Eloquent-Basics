<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name'];
    
    protected static function booted()
    {
        static::created(function ($project) {
            Stat::query()->increment('projects_count');
        });
    }
}
