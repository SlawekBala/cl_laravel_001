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


    <form action="{{ route('users.store') }}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input placeholder="WPROWADŹ NAZWĘ UŻYTKOWNIKA" type="text" class="form-control" name="name" >
        </div>

        <div class="form-group">
            <input placeholder="WPROWADŹ E-MAIL" type="text" class="form-control" name="email">
        </div>

        <div class="form-group">
            <input placeholder="WPROWADŹ HASŁO" type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            @foreach($roles as $role)

                <label>
                    <input type="checkbox" name="roles_id[]" value="{{"$role->id"}}"> {{$role->name}}
                </label>

            @endforeach
        </div>


        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>



@endsection