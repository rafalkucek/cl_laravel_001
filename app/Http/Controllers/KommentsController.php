<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\KommentsRequest;
use App\Komment;
use Illuminate\Http\Request;

class KommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Hejka";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('komments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KommentsRequest $request)
    {
//        dd($request);
//        Komment::create($request->all());
        Komment::create(['author' => $request->author,
            'content' => $request->get('content'),
            'article_id' => $request->article_id]);
//        $komment = Komment::create()
//        $komment->article_id = $request->article_id;
//        $komment->author = $request->author;
//        $komment->content = $request->content;
//        $komment->save();


        return redirect( route('komments.show', [$request->article_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($art_id)
    {

        $article = Article::findOrFail($art_id);

        $komments = Komment::select(['komments.id AS komment_id', 'komments.*'])->
        leftJoin('articles', 'komments.article_id', '=', 'articles.id')->
        where('article_id', '=', $art_id)->
        get();
//dd($komments);

        return view('komments.create',
            ['komments' => $komments,
                'article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $komment = Komment::findOrFail($id);
//dd($komments);
        return view('komments.edit',['komment' => $komment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//
//    }
    public function update(KommentsRequest $request, Komment $komment)
    {
//        dd($request->all());
//        echo $komment->update($request->all());
//        Komment::
        $komment->update(['author' => $request->author,
            'content' => $request->get('content'),
            'article_id' => $request->article_id]);



//        $categories = Category::all();
        return redirect( route('articles.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komment $komment)
    {
        $komment->delete();
        return redirect( route('articles.index'));
    }
}
