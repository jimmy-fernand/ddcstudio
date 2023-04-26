<?php

namespace App\Models;

// use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get all of the comments for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function projects()
    // {
    //     return $this->hasMany(Project::class, 'service_id', 'id');
    // }
}
