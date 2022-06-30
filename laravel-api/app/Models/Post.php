<?php

namespace App\Models;

use App\Events\PostPublished;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => PostPublished::class
    ];

    protected $fillable = [
        'website_id',
        'title',
        'body'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
