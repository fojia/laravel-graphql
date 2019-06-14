<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{

    /**
     * Get news comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        $this->hasMany(Comment::class);
    }

    /**
     * Get news user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        $this->belongsTo(User::class);
    }

}
