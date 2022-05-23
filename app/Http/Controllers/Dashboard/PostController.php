<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate('1');
        return view('dashboard.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');  
        $post = new Post();         
        // dd($categories);
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $validated = $request->validate(StoreRequest::myRules());//Request
        // $validated = Validator::make($request->all(), StoreRequest::myRules());
        // dd($validated->errors());

        // $data = array_merge($request->all(),['image'=>'jsasdasdas']);

        // $data = $request->validated();
        // $data['slug'] = Str::slug($data['title']);
        // dd($data);
        Post::create($request->validated());

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        // ]);
        // echo $request->input('slug');
        // echo request('title');
        // dd(request('title'));
        // dd($request);
        
        // return route("post.create");
        // return redirect("/post/create");
        // return redirect()->route("post.create");
        return to_route("post.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('title','id');              
        // dd($categories);
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])){
            // dd($request->image);
            // dd($request->validated()["image"]->hashName());
            // dd($request->validated()["image"]->extension());
            $fileName = time().'.'.$data["image"]->extension();
            $data["image"]=$fileName;
            // dd($fileName);
            $request->image->move(public_path("image"), $fileName);

        }
        // dd($request->validated());
        $post->update($data);
        // $request->session()->flash('status','Registro Actualizado');
        return to_route("post.index")->with('status','Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index");
    }
}
