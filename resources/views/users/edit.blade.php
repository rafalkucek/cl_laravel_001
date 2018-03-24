@extends('layouts.app')

@section('title', 'Edycja użytkownika')

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
    <form method="post" action="{{ route('users.update', $user->id)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="_method" value="put">
            <input type="text" value="{{ $user->name }}" class="form-control" name="name" placeholder="name"><br>
            <input type="text" value="{{ $user->email }}" class="form-control" name="email" placeholder="e-mail"><br>
            <input type="password" value="{{ $user->password }}" class="form-control" name="password" placeholder="password">
        </div>

        <div class="form-group">
            @foreach($roles as $role)

                <label>
                    {{ $role->name }}
                    @if(in_array($role->id, $flatSelectedRoles))
                        <input type="checkbox" checked name="roles_id[]" value="{{ $role->id }}">
                    @else
                        <input type="checkbox"  name="roles_id[]" value="{{ $role->id }}">
                    @endif
                </label>

            @endforeach
        </div>

        <button class="btn btn-success">Aktualizuj</button>
    </form>
@endsection