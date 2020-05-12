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
    <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-warning">Edit post</a>
    <form action="{{route('post.deactivate', ['id' => $post->id])}}" style="display: inline-block" method="post">
        @method('patch')
        @csrf
        @if($post->active)
            <input type="hidden" name="active" value="deactivated">
            <button type="submit" class="btn btn-info">Deactivate post</button>
        @else
            <input type="hidden" name="active" value="activated">
            <button type="submit" class="btn btn-success">Publish post</button>
        @endif
    </form>
@endsection
