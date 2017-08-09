<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Those who followed you
     * @return mixed
     */
    public function getFollowers()
    {
        return Auth::user()->followers()->get();
    }

    /**
     * Those who you following
     * @return mixed
     */
    public function getFollowing()
    {
        return Auth::user()->following()->get();
    }

    /**
     * Toggle follower
     */
    public function toggleFriend()
    {
        $user = Auth::user();
    }
}
