<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategorys = Category::paginate(10);
        return response()->json($allCategorys, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $allCategory = Category::get();
        return response()->json($allCategory, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("Categoria Eliminada");
    }

    public function post(Category $category)
    {
        // $posts = Post::join('categories', "categories.id", "=", "posts.category_id")
        // ->select("posts.*", "categories.title as category")
        // ->where("categories.id", $category->id)
        // ->get(); //querybuilder
        // ->toSql();

        // ahora eloquent
        $posts = Post::with("category")
        ->where("category_id", $category->id)
        ->get(); 
        // ->toSql();


        return response()->json($posts);
    }

    public function slug($slug)
    {
        $category = Category::where("slug", $slug)
        ->firstOrFail();
        return response()->json($category, 200);
    }
}
