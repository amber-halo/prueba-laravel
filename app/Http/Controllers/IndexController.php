<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use TCG\Voyager\Models\User;

class IndexController extends Controller
{
    public function index() {
        // Get the posts that are published, sort by decreasing order of "id".
        $posts = Post::where('is_published', true)->orderBy('id', 'desc')->get();

        // Get the featured posts
        $featured_posts = Post::where('is_published', true)->where('is_featured', true)->orderBy('id', 'desc')->take(5)->get();

        // Get all the categories
        $categories = Category::all();

        // Get all the tags
        $tags = Tag::all();

        // Get the recent 5 posts
        $recent_posts = Post::where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get();

        // Return the data to the corresponding view
        return view('home', array(
            'posts' => $posts,
            'featured_posts' => $featured_posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ));
    }
}
