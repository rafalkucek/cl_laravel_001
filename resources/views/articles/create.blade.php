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

    <form action=" {{ route('articles.store') }} " method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Tytuł"><br>
            <textarea name="body" placeholder="Podaj tresc artykułu" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                @foreach($files as $file)
                    <label>
                        <img src="/storage/thumb_{{ $file->file_name }}" alt="">
                        <input type="checkbox" name="files_id[]" value="{{ $file->id }}">
                    </label>
                @endforeach
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection