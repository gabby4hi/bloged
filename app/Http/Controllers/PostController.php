<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //we will be fetching all the data from the database;
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'=> 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
                ));

            $post = new Post;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->body = $request->body;

            $post->save();

            Session::flash('success', 'The Post was Successfully Submitted!');

            return redirect()->route('post.show', $post->id);


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //This where we will be editing some of the post content ...

        $post = Post::find($id);

        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Updating the values Reported in 
        //first we do the validating first..
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
             $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required']);
        }else{

             $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required']);

        }
        //trying to link up to the model
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

         Session::flash('success', 'The Post was Successfully Submitted!');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deleting from the base now 
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', ' The is row number'.$post->id.'as been deleted from the storage');

        return redirect()->route('post.index');
    }
}
