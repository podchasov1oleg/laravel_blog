@extends('layouts.admin')
@section('title', 'Portfolio edit')
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
                                    <img src="{{asset($image->src)}}" class="card-img-top w-25 d-inline-block p-3">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Add portfolio images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image1" class="custom-file-input" id="exampleInputFile1">
                                        <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image2" class="custom-file-input" id="exampleInputFile2">
                                        <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image3" class="custom-file-input" id="exampleInputFile3">
                                        <label class="custom-file-label" for="exampleInputFile3">Choose file</label>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image4" class="custom-file-input" id="exampleInputFile4">
                                        <label class="custom-file-label" for="exampleInputFile4">Choose file</label>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image5" class="custom-file-input" id="exampleInputFile5">
                                        <label class="custom-file-label" for="exampleInputFile5">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" {{$portfolio->active ? 'checked' : ''}} name="active" class="form-check-input" id="exampleCheck1">
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
