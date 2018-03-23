@extends('layouts.app')

@section('title', 'Użytkownicy')

@section('content')
    <a href=" {{ route('users.create') }} " class="btn btn-success">Dodaj użytkownika</a>
    <br><br>
    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('users.destroy', $user->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $users->links() }}
@endsection