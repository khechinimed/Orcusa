<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class BlogController extends Controller
{
    //
    public function getPosts(){
        $posts = WinkPost::with('tags')->live()->orderBy('publish_date', 'DESC')->paginate(4);
        return $posts;
    }

    public function showPost($slug){
        $post = WinkPost::where('slug', $slug)->first();
        return $post;
    }
}
