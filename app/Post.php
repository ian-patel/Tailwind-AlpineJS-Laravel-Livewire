<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'link', 'image', 'clicks',
        'magic_source_created', 'hash',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'magic_source_created' => 'datetime',
        'active' => 'boolean',
    ];

    /**
     * Get the source of the post.
     */
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    /**
     * Scope a query to only specified source.
     *
     * @param $query
     * @param string $source
     * @return Builder
     */
    public function scopeOfSource($query, string $source): Builder
    {
        return $query
            ->whereHas('source', function ($query) use ($source) {
                $query->whereIn('code', (array) $source);
            });
    }

    /**
     * Scope a query to only active posts.
     *
     * @return Builder
     */
    public function scopeActive($query, $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Create a new instance from feed.
     *
     * @param  array|object  $feed
     * @return Model|$this
     */
    public static function newInstanceFromFeed($feed): self
    {
        $post = (new static)->newInstance($feed);
        $post->magic_source_id = $feed->id;
        $post->magic_source_created = new Carbon($feed->created);
        $post->slug = Str::slug($feed->title ?? '');

        return $post;
    }

    /**
     * Get Url of the post.
     *
     * @return string
     */
    public function getURLAttribute(): string
    {
        return "/p/{$this->id}-" . ($this->slug ?: 'a');
    }
}
