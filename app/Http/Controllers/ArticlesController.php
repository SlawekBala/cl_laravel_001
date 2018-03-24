<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\File;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')
        ->paginate(10);

        return view('articles.index', [
            'articles' => $articles

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();

        $categories = Category::all();

        return view('articles.create', [
            'categories' => $categories,
            'files' => $files
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {

        $article = Article::create($request->all());

        $article->files()->attach($request->get('files_id'));

//        $article = new Article();
//        $article->title = $request->title;
//        $article->body = $request->body;
//        $article->category_id = $request->category_id;
//        $article->save();

        return redirect( route('articles.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Article $article)
    {

        $files = File::all();
        $categories = Category::all();

//        $flatSelectedFiles = [];
//
//        foreach ($article->files()->get() as $file) {
//            $flatSelectedFiles[] = $file->id;
//        }

        //dd($selectedFiles);


        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories,
            'files' => $files,
            'flatSelectedFiles' => $article->files()->pluck('id')->toArray()
        ]);
    }


    public function update(ArticlesRequest $request, Article $article)
    {
//        $categories = Category::all();
//
//        $article->title = $request->title;
//        $article->body = $request->body;
//        $article->category_id = $request->category_id;
//
//        $article->save();

        $article->update($request->all());
        $article->files()->sync($request->get('files_id'));

        return redirect( route('articles.index'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect( route('articles.index'));
    }
}
