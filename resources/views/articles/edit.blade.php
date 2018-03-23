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
    <form action=" {{ route('articles.update', $article->id) }} " method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $article->title }}" name="title"><br>
            <textarea name="body" placeholder="Podaj tresc artykułu" class="form-control" cols="30" rows="10">{{ $article->body }}</textarea>
            <br>

                <div class="form-group">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            @if($category->id == $article->category_id)
                                <option selected value="{{ $category->id }}" >{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection