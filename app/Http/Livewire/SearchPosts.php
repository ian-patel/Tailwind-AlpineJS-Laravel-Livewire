<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class SearchPosts extends Component
{
    public $q;

    protected $updatesQueryString = ['q'];

    public function mount()
    {
        $this->q = request()->query('q', $this->q);
    }

    public function render()
    {
        if ($this->q and Str::length($this->q) > 3) {
            $posts = Post::where('title', 'like', '%' . $this->q . '%')
                ->latest()
                ->orderby('clicks', 'desc')
                ->limit(5)
                ->get();
        }

        return view('livewire.search-posts', [
            'posts' => $posts ?? collect(),
        ]);
    }
}
