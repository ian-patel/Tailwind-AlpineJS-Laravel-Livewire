<?php

namespace App\Console\Commands;

use App\Post;
use App\Source;
use App\Clients\MagicSource;
use Illuminate\Console\Command;

class FetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from Magic source.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sources = Source::all();
        $feeds = MagicSource::fetch($limit = 2);

        $feeds->each(function ($feed) {
            $feed->hash = md5($feed->link);
        });

        // Unique hash|url only
        $feeds = $feeds->unique('hash');

        // Get the posts already exists in database.
        $posts = Post::whereIn('hash', $feeds->pluck('hash'))->select('hash')->get();

        foreach ($feeds as $feed) {
            // Post do not have id or Post do not have source.
            $source = $sources->firstWhere('code', $feed->source);
            if ($source === null) {
                continue;
            }

            // Find the post in memory if already exist.
            $post = $posts->firstWhere('hash', $feed->hash);
            if ($post) {
                continue;
            }

            // Create new instance of post using feed.
            $instance = Post::newInstanceFromFeed($feed);

            // associate source with the instance.
            $instance->source()->associate($source);
            $instance->save();
        }
    }
}
