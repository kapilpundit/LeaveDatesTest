<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Website Modal class
 */
class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * The user that belong to the website.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
