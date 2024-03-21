<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasVerifiedEmail()) {
                return view('dashboard'); // Or another view for authenticated users
            }
            // redirect(route('posts.index'));
        } else {
            return view('home', [
                'posts' => Post::with('user')->latest()->get(),
            ]);
        }
    }
}
