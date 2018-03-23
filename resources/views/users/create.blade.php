@extends('layouts.app')

@section('title', 'Nowy użytkownik')

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

    <form method="post" action="{{ route('users.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name"><br>
            <input type="text" class="form-control" name="email" placeholder="e-mail"><br>
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <button class="btn btn-success">Zapisz</button>
    </form>
@endsection