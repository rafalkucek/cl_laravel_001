<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index commetn";
//        $id = $article->id;
//        dd($id);

//        return view('articles.show', ['article' => Comment::findOrFail($id)]);
        //return view('comments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create comment";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {
//        dd($request);
//        $comment = new Comment();
//        $comment->author = $request->author;
//        $comment->content = $request->content;
//        $comment->article_id = $request->article_id;
//        $comment->save();

       Comment::create($request->all());
//dd($request);
//dd($request->article_id);
        return redirect( route('articles.show', $request->article_id));
//        return redirect( route('articles.show', ['comment' => Comment::findOrFail($request->article_id)]));
//        return redirect( route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show commnet";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentsRequest $comment)
    {
        dd($comment);
        $comment = Comment::all();
        return view ('comments.edit', [
            'comment' => $comment
//            'article' => $comment->article_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentsRequest $request, Comment $comment)
    {
      dd($request->all());
        echo $comment->update($request->all());

//        $categories = Category::all();
        return redirect( route('articles.show', ['comment' => Comment::findOrFail($comment->id)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentsRequest $comment)
    {
        dd($comment->all());
        $delete = Comment::where('id', '=', $comment->id);
//        $comment_a = CommentsRequest::findOrFail($comment->id);
//        echo "testestetg";
//       dd($comment->delete());
//        Comment::deleting($comment->all());
//        $comment->delete();
        $delete->delete();
        return redirect( route('articles.show', $comment->article_id ));
    }
}
