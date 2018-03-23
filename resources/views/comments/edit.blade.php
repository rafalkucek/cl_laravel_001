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
    <form action=" {{ route('comments.update', $comment->id) }} " method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="hidden" value="{{ $comment[0]->article_id }}" name="article_id">
            <input type="text" class="form-control" value="{{ $comment->author }}" name="author">
            <br>
            <textarea name="body"  class="form-control" cols="30" rows="10">
                {{ $comment->content }}
            </textarea>
            <br>

        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection