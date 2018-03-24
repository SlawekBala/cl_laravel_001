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


    <form action="{{ route('comments.store') }}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="author">
        </div>

        <div class="form-group">
            <textarea type="text" rows="10" class="form-control" name="content"></textarea>
        </div>

        <div class="form-group">
            <select name="article_id" class="form-control">
                @foreach($articles as $article)

                <option value="{{$article->id}}">{{$article->title}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>



@endsection