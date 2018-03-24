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


    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <input placeholder="Podpisz się" type="text" class="form-control" value="{{$comment->author}}" name="author">
        </div>

        <div class="form-group">
            <textarea placeholder="Podpisz się" type="text" rows="20"
                      class="form-control" name="content">{{$comment->content}}</textarea>
        </div>

        <div class="form-group">
            <select name="article_id" class="form-control">
                @foreach($articles as $article)

                    @if($article->id == $article->article_id)
                        <option selected value="{{$article->id}}">{{$article->title}}</option>
                    @else
                    <option value="{{$article->id}}">{{$article->title}}</option>
                    }
                    @endif
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>

@endsection