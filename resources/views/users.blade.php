@extends('layouts.master')

@section('title','Usuarios')

@section('content')
<div class="container">
    <h2>Usuarios</h2>
    <div class="list-group">
    @foreach($users as $user)
    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$user->name}}</h5>
        </div>
    </a>
    @endforeach
    </div>
</div>
@endsection
