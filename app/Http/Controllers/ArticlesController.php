<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\File;
use App\Http\Requests\ArticleRequest;
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

        return view('articles.index',[
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

        return view('articles.create',[
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
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        $article->files()->attach($request->get('files_id'));
//        Article::create($request->all());

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
        $comments = Comment::
        leftJoin('articles', 'comments.article_id', '=', 'articles.id')->
        where('article_id', $id)->
        get();

       return view('articles.show',
           ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $files = File::all();

//        $flatSelectedFiles = [];
//        foreach ($article->files()->get() as $file){
//            $flatSelectedFiles[] = $file->id;
//        }



//        $selectedFiles = $article->files()->get()->toArray();
////        $selectedFiles = $result->fetchAll();
//        $flatSelectedFiles = [];
//        foreach ($selectedFiles as $selectedFile) {
//            $flatSelectedFiles[] = $selectedFile['id'];
//        }
//        $checked = '';
//        if(in_array($selectedFiles['id'], $flatSelectedFiles)) {
//            $checked = 'checked';
//        }

        return view('articles.edit',[
            'categories' => $categories,
            'files' => $files,
            'article' => $article,
            'flatSelectedFiles' => $article->files()->pluck('id')->toArray()
//            'flatSelectedFiles' => $flatSelectedFiles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->files()->sync($request->get('files_id'));

        return redirect( route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect( route('articles.index'));
    }
}
