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
}
