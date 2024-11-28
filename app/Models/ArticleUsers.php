<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleUsers extends Model
{
    //
    protected $fillable = ['user_id', 'article_id','quantity'];
}
