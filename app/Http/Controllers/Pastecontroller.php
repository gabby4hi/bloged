<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class Pastecontroller extends Controller
{
    //
    public function getIndex(){
    	$post = Post::orderBy('created_at', 'desc')->limit(4)->get();
    	//return view('pages.welcome')->with('posts', $post);
    }
}
