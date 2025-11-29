<?php

namespace M12\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
