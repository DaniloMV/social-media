<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Get posts
     * @return mixed
     */
    public function getPosts()
    {
        return Auth::user()->posts()->paginate(15);
    }
}
