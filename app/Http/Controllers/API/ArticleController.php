<?php

namespace App\Http\Controllers\API;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $articles = $articles->sortByDesc("publish_date");
        
        $articles = $articles->filter(function ($article, $key) {
            return $article->publish_state;
        });

        return array_values($articles->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }
}
