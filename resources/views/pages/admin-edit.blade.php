@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Post create form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('post.update')}}">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titleInput">Post title</label>
                                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Enter title" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <label for="introInput">Post intro</label>
                                <textarea name="intro" class="form-control" rows="3" id="introInput" placeholder="Enter intro">{{$post->intro}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="textarea">Post body</label>
                                    <textarea id="textarea" name="body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->body}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        {{--TODO Заглушка под изображение--}}
                                        <input type="file" disabled class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                {{--TODO Заглушка под активность--}}
                                <input type="checkbox" class="form-check-input" disabled id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Is active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
