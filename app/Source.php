<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Source extends Model
{
    /**
     * Get the posts of the source.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Scope a query to only active sources.
     *
     * @param $query
     * @param bool $active
     * 
     * @return Builder
     */
    public function scopeActive($query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Scope a query to only source code.
     *
     * @param $query
     * @param bool $active
     * 
     * @return Builder
     */
    public function scopeOfSlug($query, string $slug): Builder
    {
        return $query->where('code', $slug);
    }

    /**
     * List sources which are fetchable.
     *
     * @return array
     */
    public static function fetchableList(): array
    {
        $keys = self::active()->get()->pluck('code');
        $fetchable = [];

        foreach ($keys as $key) {
            $fetchable[$key] = 1;
        }

        return $fetchable;
    }
}
