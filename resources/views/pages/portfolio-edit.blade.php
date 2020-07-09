@extends('layouts.admin')
@section('title', 'Portfolio edit element #' . $portfolio->id)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Portfolio update form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('portfolio.update')}}">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{$portfolio->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titleInput">portfolio title</label>
                                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Enter title" value="{{$portfolio->title}}">
                            </div>
                            <div class="form-group">
                                <label for="introInput">portfolio intro</label>
                                <textarea name="intro" class="form-control" rows="3" id="introInput" placeholder="Enter intro">{{$portfolio->intro}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="textarea">portfolio body</label>
                                    <textarea id="textarea" name="body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$portfolio->body}}</textarea>
                                </div>
                            </div>
                            <div class="container-fluid">
                                @foreach($images as $image)
                                    <div class="w-25 d-inline-block p-3">
                                        <img src="{{asset($image->src)}}" class="card-img-top">
                                        <label for="delete-img{{$image->id}}">Удалить картинку</label>
                                        <input type="checkbox" name="delete-img{{$image->id}}" id="delete-img{{$image->id}}" value="{{$image->id}}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Add portfolio images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image1" class="custom-file-input" id="exampleInputFile1">
                                        <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" {{$portfolio->active ? 'checked' : ''}} name="active" class="form-check-input" value="1" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Is active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update portfolio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
