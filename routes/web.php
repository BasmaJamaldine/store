<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleUsersController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Models\ArticleUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 
    return view('welcome' );
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/article', [ArticleController::class, 'index'])->name('article')->middleware(["admin"]);
    Route::get('/article/show', [ArticleController::class, 'show'])->name('showArticle');
    Route::post("/article/filter/", [ArticleController::class, "filter"])->name("article.filter");
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware(["admin"]);
    Route::get('/article/admin', [ArticleController::class, 'create'])->name('adminArticle')->middleware(["admin"]);
    Route::get('/user/admin', [AuthenticatedSessionController::class, 'index'])->name('adminUser')->middleware(["admin"]);
    Route::post('/user/admin/role/{user}', [AuthenticatedSessionController::class, 'makeModerator'])->name('role')->middleware(["admin"]);
    Route::delete('/admin/users/{user}', [AuthenticatedSessionController::class, 'destroyUser'])->name('users.destroy')->middleware(["admin"]);
    Route::get('/panier', [ArticleUsersController::class, 'index'])->name('cart');
    Route::post('/panier/ajouter/{articleId}', [ArticleUsersController::class, 'store'])->name('shop');
    Route::delete('/articles/delet/{article}', [ArticleUsersController::class, 'destroy'])->name('articles.destroy');
    Route::patch('/articles/{id}/update/{articleId}/{userId}', [ArticleUsersController::class, 'update'])->name('articles.update');
    Route::post('/pay',[StripeController::class,'checkOut'])->name('stripe.payment');
    Route::post('/add-friend/{friendId}', [AuthenticatedSessionController::class, 'addFriend'])->name('add.friend');
    Route::get('/add-friend', [AuthenticatedSessionController::class, 'friends'])->name('friend');





});


require __DIR__.'/auth.php';
