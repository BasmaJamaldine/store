<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles=Article::all();
        return view("article",compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $articles=Article::all();
        return view("adminArticle",compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name" => "required",
            "category" => "required",
            "price" => "required",
            "size" => "required|in:s,m,l",
            "description" => "required",
            "stock" => "required",
            "type" => "required|in:nouveau,solde,hot",
            "image" => "required|image|mimes:png,jpg,jpeg|max:2024",
        ]);
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        Article::create([
            "name" => $request->name,
            "category" => $request->category,
            "price" => $request->price,
            "size" => $request->size,
            "description" => $request->description,
            "stock" => $request->stock,
            "type" => $request->type,
            "image" => $imageName,
            
        ]);
       
        return back();  
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        $articles=Article::all();
        return view("showArticle",compact('articles'));
    }
    public function filter(Request $request)
    {
        $filtredCategory = $request->category;
        $filtredType = $request->type;
        $query = Article::query();

        if ($filtredCategory && $filtredCategory !== "all") {
            $query->where("category", $filtredCategory);
        }
        if ($filtredType && $filtredType !== "all") {
            $query->where("type", $filtredType);
        }

        $articles = $query->get();

     return view("showArticle", compact("articles"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
