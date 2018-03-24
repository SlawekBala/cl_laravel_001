@extends('layouts.app')

@section('title', 'Artykuły')

@section('content')

    <a href="{{ route('articles.create') }}" class="btn btn-success">Dodaj</a>

    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>title</th>
            <th>category</th>
            <th>Tresc</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
@foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>
                    @if($article->category)
                        {{$article->category->name}}
                    @endif
                </td>
                <td>{{$article->body}}</td>
                <td>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('articles.destroy', $article->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

    @endforeach
    </table>

    {{$articles->links()}}

@endsection