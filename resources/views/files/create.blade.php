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


    <form enctype="multipart/form-data" action=" {{ route('files.store') }} " method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="file" class="form-control" name="file_name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection