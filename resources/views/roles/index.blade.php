@extends('layouts.app')

@section('title', 'Coś fajnego i szybkiego')


@section('content')
    <a href=" {{ route('roles.create') }} " class="btn btn-success">Dodaj rolę</a>
    <br><br>
    <table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

@foreach($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <form method="post" action="{{ route('roles.destroy', $role->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Usuń</button>
            </form>
        </td>
    </tr>

@endforeach

</table>
    {{ $roles->links() }}
@endsection