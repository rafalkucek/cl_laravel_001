@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div>
    <a href="{{ route('articles.index', $comment->id) }}" class="btn btn-primary">Lista artykułów</a>
</div>
    <div>
        {{ $comments[0]->article_id }}.  <b>{{ $comments[0]->title }}</b>
    </div>
    <div>
        {{ $comments[0]->body }}
    </div>
    <div><hr>Komentarze: <br>
        @foreach($comments->all() as $comment)
            {{ $comment->content }}<br>
            <b><i> {{ $comment->author }} </i></b><br>
            <table>
                <tr>
                    <td>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Edit</a>
                    <td/>
                    <td>
                        <form class="form-inline" method="post" action="{{ route('comments.destroy', $comment->id) }}">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{ $comment->id }}">
                            <input type="hidden" name="content" value="{{ $comment->content }}">
                            <input type="text" name="article_id" value="{{ $comment->article_id }}">
                            <input type="hidden" name="author" value="{{ $comment->author }}">
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            </table>
        @endforeach
        <br>
    </div>
    <form action="{{ route('comments.store', $comments[0]->article_id) }}" method="post">
        {{ csrf_field() }}
        {{--<input type="hidden" name="_method" value="put">--}}

        <input type="hidden" name="article_id" value="{{ $comments[0]->article_id }}">
        <div class="form-group">
            <input placeholder="Login" name="author"  type="text" class="form-control"><br>
            <textarea class="form-control" placeholder="Treść" name="content" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Dodaj komentarz</button>
        </div>
    </form>
@endsection