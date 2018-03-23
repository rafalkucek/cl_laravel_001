@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('articles.index') }}" class="btn btn-primary">Lista artykułów</a>
    </div>
<br>
    {{ $article->id }}. {{ $article->title }}<br>
    {{ $article->body }}<hr>



    {{--{{ $komments }}--}}
@foreach($komments as $komment)
    {{ $komment->id }}.
    {{ $komment->content }}<br>
    autor: <b>{{ $komment->author }}</b><br>

    <table>
        <tr>
            <td>
                <a href="{{ route('komments.edit', $komment->id) }}" class="btn btn-primary">Edit</a>
            <td/>
            <td>
                <form class="form-inline" method="post" action="{{ route('komments.destroy', $komment->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $komment->id }}">
                    <input type="hidden" name="content" value="{{ $komment->content }}">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <input type="hidden" name="author" value="{{ $komment->author }}">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-danger">Usuń</button>
                </form>
            </td>
        </tr>
    </table>
    @endforeach
<br>

    <form action="{{ route('komments.store', $article->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="form-group">
            <input placeholder="Login" name="author"  type="text" class="form-control"><br>
            <textarea class="form-control" placeholder="Treść" name="content" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Dodaj komentarz</button>
        </div>
    </form>

@endsection