@extends('layouts.app')

@section('title', 'Komentarze')

@section('content')

    <a href="{{ route('comments.create') }}" class="btn btn-success">Dodaj</a>

    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Autor</th>
            <th>Artykuł</th>
            <th>Tresc</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
@foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>
                    @if($comment->article)
                        {{$comment->article->title}}
                    @endif
                </td>
                <td>{{$comment->content}}</td>
                <td>
                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('comments.destroy', $comment->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

    @endforeach
    </table>

    {{$comments->links()}}

@endsection