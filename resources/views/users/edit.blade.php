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


    <form action="{{ route('users.update', $user->id) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <input type="text" class="form-control" value="{{$user->name}}" name="name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" value="{{$user->email}}" name="email">
        </div>

        <div class="form-group">
            <input placeholder="WPROWADŹ NOWY E-MAIL" type="text" class="form-control" value="" name="email">
        </div>

        <div class="form-group">
            <input placeholder="WPROWADŹ NOWE HASŁO" type="password" class="form-control" value="" name="password">
        </div>


        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>

@endsection