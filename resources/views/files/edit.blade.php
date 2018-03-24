@extends('layouts.app')

@section('content')

    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}


    <form enctype="multipart/form-data" action="{{ route('files.update', $file->id) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="file" class="form-control" value="{{$file->file_name}}" name="file_name">
            <img src="/storage/thumb{{$file->file_name}}" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>



@endsection