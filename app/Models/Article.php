<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'name', 
        'category',
        'price', 
        'size', 
        'description', 
        'stock',
        'type', 
        'image'];
        public function users()
        {
            return  $this->belongsToMany(User::class, "Article_Users")->withPivot('quantity');
        }
}
