<?php

namespace App\Models;

use App\Models\Photo;
// use App\Models\Service;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get all of the photos for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'project_id');
    }
    /**
     * Get the user that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
