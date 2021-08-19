<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        $posts = Post::all();
        return view('backend\posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->hasFile('photo')){
            $file = $request->photo;
            $new_file = time().$file->getClientOriginalName();
            $file->move('images',$new_file);
        }
       Post::create([
           "title"=>$request->title,
           "content"=>$request->content,
           "photo"=>'images'.$new_file,
       ]);
       return redirect()->route('index');
      // dd($request->ALL());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('backend\posts.edit',compact('posts'));
        
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
        $posts = Post::find($id);

        
       if($request->hasFile('photo')){
        $file = $request->photo;
        $new_file = time().$file->getClientOriginalName();
        $file->move('images',$new_file);

        $posts->photo = 'images'.$new_file;
        
        $posts->title = $request->title;
        
        $posts->content = $request->content;
        $posts->update();
        return redirect()->route('index');


    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts =Post::find($id);
        $posts->destroy($id);
        return redirect()->route('index');
    }
}
