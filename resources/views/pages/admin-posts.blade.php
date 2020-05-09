@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            @if(!empty(session('success')) && session('updated'))
                <div class="callout callout-success">
                    <h5>New post has been created</h5>
                    <p>You successfully added new post in database!</p>
                </div>
            @elseif(!empty(session('updated')) && session('updated') == 'updated')
                <div class="callout callout-info">
                    <h5>New post has been updated</h5>
                    <p>You successfully updated post in database!</p>
                </div>
            @elseif(!empty(session('deleted')) && session('deleted') == 'deleted')
                <div class="callout callout-warning">
                    <h5>The post was deleted successfully</h5>
                    <p>You just deleted a post from database!</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Intro</th>
                            <th>Body</th>
                            <th>Created at</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td style="max-width: 200px; overflow: hidden">{{$post->intro}}</td>
                                    <td style="max-width: 200px; overflow: hidden">{{$post->body}}</td>
                                    <td style="max-width: 200px; overflow: hidden">{{$post->created_at ?? "-"}}</td>
                                    <td>
                                        <a href="{{route('admin.posts.show', ['id' => $post->id])}}" class="btn btn-block btn-primary btn-sm">See more</a>
                                        <a href="{{route('posts.show', ['id' => $post->id])}}" class="btn btn-block btn-success btn-sm">See in public</a>
                                        {{--TODO добавить сюда ссылку, когда будет маршрут--}}
                                        <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$post->id}}">
                                            Delete Post
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @foreach($posts as $post)
        <div class="modal fade" id="modal-danger{{$post->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">You are going to delete post with ID {{$post->id}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{route('post.delete', ['id' => $post->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-danger">I am sure, delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
