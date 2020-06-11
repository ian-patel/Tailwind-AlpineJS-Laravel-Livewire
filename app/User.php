<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'avatar',
        'provider', 'provider_id', 'provider_token', 'provider_token_secret',
        'location', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the favorites post of the user.
     */
    public function favorites()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    /**
     * Favorite the post.
     *
     * @param Post $post
     * @return void
     */
    public function favorite(Post $post)
    {
        $this->favorites()->syncWithoutDetaching([$post->id]);
    }

    /**
     * Unfavorite the post.
     *
     * @param Post $post
     * @return void
     */
    public function unfavorite(Post $post)
    {
        $this->favorites()->detach([$post->id]);
    }
}
