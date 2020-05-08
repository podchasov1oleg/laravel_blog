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
            {!!$post->body!!}
        </div>
    </div>
    <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-block btn-warning">Edit post</a>
@endsection
