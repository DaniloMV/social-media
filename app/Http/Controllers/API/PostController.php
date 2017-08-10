<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Zend\Diactoros\Request;

class PostController extends Controller
{
    /**
     * Get posts
     * @return mixed
     */
    public function getPosts()
    {
        $posts = Auth::user()->followers()->with('posts')->get();
        $result = Auth::user()->posts()->get();
        foreach ($posts as $post) {
            $result->push($post->post);
        }
        return $result;
    }

    public function makePost(Request $request)
    {
        return $request->all();
    }
}
