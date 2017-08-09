<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Get all users
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return User::all();
    }

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
