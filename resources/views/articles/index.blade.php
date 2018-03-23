@extends('layouts.app')

@section('title', 'Coś fajnego i szybkiego')


@section('content')
    <a href=" {{ route('articles.create') }} " class="btn btn-success">Dodaj artykuł</a>
    <br><br>
    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Body</th>
            <th>Comment</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td><a href="{{ route('articles.show', $article->id) }}" >{{ $article->title }}</a></td>
                <td>
                    @if($article->category)
                        {{ $article->category->name }}
                    @endif
                </td>
                <td>{{ $article->body }}</td>
                <td>
                    <a href="{{ route('komments.show', $article->id) }}" class="btn btn-primary">Comment</a>
                </td>
                <td>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $articles->links() }}
@endsection