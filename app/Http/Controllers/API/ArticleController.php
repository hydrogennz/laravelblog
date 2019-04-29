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
    public function index(Request $request)
    {
        $articles = Article::all();
        $articles = $articles->sortByDesc("publish_date");
        
        // Not ideal, need to move loading of all articles into a private API now that we are creating distinction between published/draft states
        if($request->get('showAll') !== 'true')
        {
            $articles = $articles->filter(function ($article, $key) {
                return $article->publish_state;
            });    
        }

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
