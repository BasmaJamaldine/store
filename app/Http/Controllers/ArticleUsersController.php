<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ArticleUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $articles = $user->articles; 

        $total = 0;
        foreach ($articles as $article) {
            $total += $article->price * $article->pivot->quantity;
        }
    
        return view('cart', compact('articles','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $articleId )
    {   
       
        $request->validate([
            "quantity" => "required|integer|min:1",
        ]);
    
        $user = Auth::user();
        $quantityToAdd = $request->quantity;

        if ($user) {
    
            $article =Article::find($articleId);
            
            if ($article->stock < $quantityToAdd) {
                return back()->withErrors("Stock insuffisant pour cet article.");
            }
            
            $existingArticle = $user->articles()->where('article_id', $articleId)->first();
            if ($existingArticle) {
                
                $newQuantity = $existingArticle->pivot->quantity + $quantityToAdd;
                $user->articles()->updateExistingPivot($articleId, ['quantity' => $newQuantity]);
            } else {
               
                $user->articles()->attach($articleId, ['quantity' => $quantityToAdd]);
            }

          
            $article->stock -= $quantityToAdd;
            $article->save(); 
        }
        return back();
    
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$articleId,$userId)
    {
        $user = auth()->user();
    
        $article = auth()->user()->articles()->find($articleId);

        if (!$article) {
            return redirect()->back()->with('error', 'Article non trouvé dans le panier.');
        }
    
        // Vérifier l'action demandée (augmenter ou diminuer)
        if ($request->action === 'increase') {
            $article->pivot->quantity += 1;
        } elseif ($request->action === 'decrease' && $article->pivot->quantity > 1) {
            $article->pivot->quantity -= 1;
        }
    
        // Sauvegarder les changements
        $article->pivot->save();
        $total = 0;
        foreach ($user->articles as $item) {
            $total += $item->price * $item->pivot->quantity;
        }
    
        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($articleId)
{
    $user = Auth::user();
    
    if ($user) {
        // Supprime l'association entre l'utilisateur et l'article dans la table pivot
        $user->articles()->detach($articleId);
    }

    return back()->with('success', 'Article supprimé du panier');
}
}
