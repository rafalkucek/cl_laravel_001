<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
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


        //        $articles = Article::paginate(10);
//        return view('articles.index',[
//            'articles' => $articles
//        ]);

        $articles = Article::with('category')
            ->paginate(10);
//dd($articles);

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
        $categories = Category::all();
        return view('articles.create',[
            'categories' => $categories
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
        //dd($request->all());

//        $article = new Article();
//        $article->title = $request->title;
//        $article->body = $request->body;
//        $article->category_id = $request->category_id;
//        $article->save();

        Article::create($request->all());

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

//        $articles = Article::findOrFail($id);


//        $comments = Comment::with('article')->
////        leftJoin('articles', 'comments.article_id', '=', 'articles.id')->
//        where('comments.article_id', '=', 'articles.id')->
//            where('articles.id', '=', $id)->
//        all();
////            ->
////        findOrFail($articles->id);
//dump($comments);
//        dd($comments->all());


        $comments = Comment::
        //with('comment')->
        leftJoin('articles', 'comments.article_id', '=', 'articles.id')->
        where('article_id', $id)->
            get();


//        findOrFail($articles->id);

//        $comment = Comment::with('article')
//            ->where('article_id',$articles->id)->paginate(10);

//            Article::with('comments')->findOrFail($id);


//            dd(Comment::
//            //with('comment')->
//            leftJoin('articles', 'comments.article_id', '=', 'articles.id')->
//            where('article_id', $articles->id)->
//            findOrFail($articles->id));


//        dd($comments);
//        return view('articles.index',[
//            'articles' => $articles
//        ]);
//        dd(Article::with('comments')->findOrFail($id));
       return view('articles.show',
//           ['article' => $articles],
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
        return view ('articles.edit', [
            'categories' => $categories,
            'article' => $article
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
//        $article->title = $request->title;
//        $article->body = $request->body;
//        $article->category_id = $request->category_id;
//        $article->save();

        $article->update($request->all());

//        $categories = Category::all();
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
