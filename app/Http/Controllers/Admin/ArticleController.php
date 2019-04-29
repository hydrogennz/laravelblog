<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;
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
        $articles = $articles->sortByDesc("updated_at");

        return view('admin/articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/newarticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();

        $article = Article::create($request->all());
        $article->publish_state = $request->get('publish_state') == 'on';
        $article->author = $user->name;
        
        if($article->publish_state) 
        {
            $article->publish_date = (Carbon::now())->toISOString();
        }
        else
        {
            $article->publish_date = NULL;
        }

        $article->num_views = 0;
        $article->save();

        return redirect('admin/articles')->with('success', 'Article has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin/article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin/editarticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // Escape content
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->publish_state = $request->get('publish_state') == 'on';
    
        if($article->publish_state) 
        {
            $article->publish_date = (Carbon::now())->toISOString();
        }
        else
        {
            $article->publish_date = NULL;
        }

        $article->save();

        return redirect('admin/articles')->with('success', 'Article has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('admin/articles')->with('success', 'Article has been deleted');
    }
}
