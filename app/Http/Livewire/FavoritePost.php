<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;

class FavoritePost extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function favorite()
    {
        auth()->user()->favorite($this->post);
        $this->post->favorite = true;
    }

    public function unfavorite()
    {
        auth()->user()->unfavorite($this->post);
        $this->post->favorite = false;
    }

    public function render()
    {
        return view('livewire.favorite-post');
    }
}
