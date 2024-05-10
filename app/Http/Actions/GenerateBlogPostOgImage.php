<?php

namespace App\Http\Actions;

use App\Models\Post;
use App\OgImageGenerator;

class GenerateBlogPostOgImage
{
    public function __invoke($year, $slug)
    {
        $post = Post::find($year.'/'.$slug);

        $image = cache()->rememberForever('posts.' . $post->slug . '.ogimage', function () use ($post) {
            return (new OgImageGenerator())->render(
                view('og.post')->with(['post' => $post])->render()
            );
        });

        return response($image)
            ->header('Content-Type', 'image/png');
    }
}
