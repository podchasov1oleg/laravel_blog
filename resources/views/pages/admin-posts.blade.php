@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
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
                                        <a href="{{route('admin.posts.show', ['id' => $post->id])}}" class="btn btn-block btn-primary btn-sm">To detail</a>
                                        {{--TODO добавить сюда ссылку, когда будет маршрут--}}
                                        <a href="#" class="btn btn-block btn-danger btn-sm">Delete post</a>
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
@endsection
