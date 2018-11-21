<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use \Input as Input;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post = new Post;

        $imagePath = "";
        if($request->hasfile('photo')){
            $imagePath = $request->file('photo')->store('public');
        }
        if(empty($request->title) && empty($request->postcontent)){

            $error =array("err"=>"please input not be empty") ;
            return view('/addpost',$error);
        }else{
            $post->title = $request->title;
            $post->content = $request->postcontent;
            $post->image = $imagePath;
            $post->save();
            return redirect('/listposts');

        }
    }



    public function listfunc($id,$name){

        if($id=="" && $name == "hi"){
            return redirect('/listposts');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addComment(Request $request,$id)
    {

        $post = new Comment;

        $post->content = $request->comment;
        $post->post_id = $id;
        $post->save();
        return redirect('/listposts');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $allpost= Post::all();

        $arr = Array('posts'=>$allpost);
        return view('listposts',$arr);

    }

    public function getIndexContent($id)
    {



  //return back() (to request)
        $posts=   Post::find($id);

        $allcomment = Comment::find($id);
 /*     $allcomment =  $posts->comment;*/
       $arr = array("comment"=>$allcomment,'posts'=>$posts);
            return view("post",$arr);



    }
    public function edit(Request $request,$id)
    {
        $getpost = Post::find($id);
        $getpost->title = $request->title;
        $getpost->content = $request->conten;
        $getpost->save();
        return redirect('/listposts');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $getpost = Post::find($id);

        $getpost->delete();
        return redirect('/listposts');
        //
    }
}
