@extends('layouts.admin')
@section('title', 'Portfolio create page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Portfolio create form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('portfolio.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titleInput">Portfolio title</label>
                                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="introInput">Portfolio intro</label>
                                <textarea name="intro" class="form-control" rows="3" id="introInput" placeholder="Enter intro"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="textarea">Portfolio body</label>
                                    <textarea id="textarea" name="body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Images for Portfolio (825*464px)</label>
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
                                <input type="checkbox" checked class="form-check-input" name="active" value="1" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Is active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
