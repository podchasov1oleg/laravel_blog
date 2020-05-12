@extends('layouts.admin')
@section('content')
    <?php
        switch (session('action')) {
            case 'activated':
                if (session('success')) {
                    $notice = 'activated successfully';
                } else {
                    $notice = 'not activated successfully';
                }
                break;
            case 'deactivated':
                if (session('success')) {
                    $notice = 'deactivated successfully';
                } else {
                    $notice = 'not deactivated successfully';
                }
                break;
            case 'added':
                if (session('success')) {
                    $notice = 'added successfully';
                } else {
                    $notice = 'not added successfully';
                }
                break;
            case 'updated':
                if (session('success')) {
                    $notice = 'updated successfully';
                } else {
                    $notice = 'not updated successfully';
                }
                break;
            case 'deleted':
                if (session('success')) {
                    $notice = 'deleted successfully';
                } else {
                    $notice = 'not deleted successfully';
                }
                break;
        }
    ?>
    <div class="row">
        <div class="col-12">
            @if(!empty($notice))
                <div class="callout callout-info">
                    <h5>The post was {{$notice}}</h5>
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
                            <th>Active</th>
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
                                    <td style="max-width: 200px; overflow: hidden">{{$post->title}}</td>
                                    <td style="max-width: 100px;"><input type="checkbox" {{$post->active ? 'checked' : ''}} onclick="return false;" name="" id=""></td>
                                    <td style="max-width: 200px; overflow: hidden;word-break: break-word;">{{$post->intro}}</td>
                                    <td style="max-width: 200px; overflow: hidden;word-break: break-word;">{{$post->body}}</td>
                                    <td style="max-width: 100px; overflow: hidden">{{$post->created_at ?? "-"}}</td>
                                    <td>
                                        <a href="{{route('admin.posts.show', ['id' => $post->id])}}" class="btn btn-block btn-outline-info btn-sm">See more</a>
                                        <a href="{{route('posts.show', ['id' => $post->id])}}" class="btn btn-block btn-outline-primary btn-sm">See in public</a>
                                        {{--TODO добавить сюда ссылку, когда будет маршрут--}}
                                        <button type="button" class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-danger{{$post->id}}">
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
