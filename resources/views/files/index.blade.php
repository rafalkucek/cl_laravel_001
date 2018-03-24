@extends('layouts.app')

@section('title', 'Coś fajnego i szybkiego')

@section('content')
    <a href=" {{ route('files.create') }} " class="btn btn-success">Dodaj plik</a>
    <br><br>
    <table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

@foreach($files as $file)
    <tr>
        <td>{{ $file->id }}</td>
        <td><img src="/storage/thumb_{{ $file->file_name }}" /></td>
        <td>
            <a href="{{ route('files.edit', $file) }}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <form method="post" action="{{ route('files.destroy', $file->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Usuń</button>
            </form>
        </td>
    </tr>

@endforeach

</table>
    {{ $files->links() }}
@endsection