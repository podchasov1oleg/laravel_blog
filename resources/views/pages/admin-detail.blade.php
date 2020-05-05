@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$post->title}}</h3>
        </div>
        <div class="card-body">
            {{$post->intro}}
        </div>
        <div class="card-footer">
            {{$post->body}}
        </div>
    </div>
    {{--TODO сделать маршруты и ссылки--}}
    <a href="#" class="btn btn-block btn-warning">Edit post</a>
    <a href="#" class="btn btn-block btn-danger">Delete post</a>
@endsection
