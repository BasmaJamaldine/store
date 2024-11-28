<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    //
    public function checkOut(){

        Stripe::setApiKey(config('stripe.sk'));
        
        // $products = Cart::where('user_id', Auth::user()->id)->get();

        // dd($products);

        $user = User::where('id', Auth::user()->id)->first();

        $articles = $user->articles()->get();

        $line_items = [];

        foreach($articles as $article){
            $line_items[]= [
                'price_data' => [
                    'currency'     => 'mad',
                    'product_data' => [
                        "name" => $article->name,
                        "description"=> $article->description,
                    ],
                    'unit_amount'  => $article->price * 100,
                //     'recurring' => [
                //     'interval' => 'month', 
                // ],
                ],
                'quantity'   => $article->pivot->quantity,
            ];
        }

        $session = Session::create([
            'line_items'  => $line_items,
            'mode'        => 'payment', 
            // 'mode'        => 'subscription', 
            'success_url' => route('showArticle'), 
            'cancel_url'  => route('showArticle'), 
        ]);

        return redirect()->away($session->url);
    }
}
