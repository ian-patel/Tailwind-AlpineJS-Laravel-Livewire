<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::with('source')
            ->active()
            ->latest()
            ->simplePaginate(60);

        if (auth()->user()) {
            $favorites =  auth()->user()->favorites()->select('id')->get();

            foreach ($posts->items() as $post) {
                $post->favorite = $favorites->firstWhere('id', $post->id) ? true : false;
            }
        }
        return view('livewire.show-posts')->with(['posts' => $posts]);
    }
}
