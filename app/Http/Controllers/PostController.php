<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /*
    public function getdashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }*/
    public function index()
    {
        $post = Post::all();
        return view('posts.index')->with('posts',$post);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('posts.create');
    }
    /*public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'content'=> 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $post= new Post();
        $post->user_id=$request['user_id'];
        $post->title= $request['title'];
        $post->content= $request['content'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $name);
        }



        $message ='There is an error.';
        if($request->user()->posts()->save($post))
        {
            $message="Post Created Successfully.";
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);

    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required| max:50',
            'content'=> 'required|max:100',
            'cover_images'=>'image|nullable|max:1999'
        ]);

        if ($request->hasfile('cover_image')) {
            $filenamewithext = $request ->file ('cover_image')->getClientOriginalName();
            $filename =pathinfo($filenamewithext, PATHINFO_FILENAME);
            $extension =$request ->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $post= new Post();
        $post->title= $request['title'];
        $post->content= $request['content'];
        $post->user_id= $request['user_id'];
        $post->user_id= auth()->user()->id;
        $post->cover_image= $fileNameToStore;

        $post->save();
        return redirect('/posts')->with(['success','Post created successfully']);

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
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request, [
            'title'=>'required| max:50',
            'content'=> 'required|max:100',
            'cover_images'=>'image|nullable|max:1999'
        ]);

        if ($request->hasfile('cover_image')) {
            $filenamewithext = $request ->file ('cover_image')->getClientOriginalName();
            $filename =pathinfo($filenamewithext, PATHINFO_FILENAME);
            $extension =$request ->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        $post=Post::find($id);
        $post->title= $request['title'];
        $post->content= $request['content'];
        if ($request->hasfile('cover_image')) {
            $post->cover_image= $fileNameToStore;
        }
       # $post->user_id=auth()->user()->id;
        $post->save();
        return redirect('/posts')->with(['success','Post updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with(['success','Post deleted Successfully.']);
    }


    /*public function getdeletepost($post_id)
    {
       $post = Post::where('id', $post_id)->first();
       if(Auth::user()!= $post->user){
           return redirect()->back();
       }
       $post->delete();
       return redirect()->route('dashboard')->with(['message' => 'successfully deleted!']);
    }*/
}
