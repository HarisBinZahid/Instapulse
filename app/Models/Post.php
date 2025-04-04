<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'posts';

    protected $fillable = [
        'caption',
        'image_path',
        'image_url',
        'user_id',
    ];

    public function user(): BelongsTo|\MongoDB\Laravel\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany|\MongoDB\Laravel\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany|\MongoDB\Laravel\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }
}
