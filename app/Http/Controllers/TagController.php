<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;

class TagController extends Controller
{
    public function index($slug) {
        // Get the requested tag
        $tag = Tag::query()->where('slug', $slug)->first();

        // Get the posts with that tag
        $posts = $tag->posts()->get();

        // Get all the categories
        $categories = Category::all();

        // Get all the tags
        $tags = Tag::all();

        // Get the recent 5 posts
        $recent_posts = Post::where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get();

        // Return the data to the corresponding view
        return view('tag', array(
            'tag' => $tag,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));
    }
}
