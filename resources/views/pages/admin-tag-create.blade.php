@extends('layouts.admin')
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
                        <h3 class="card-title">Post create form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('tags.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titleInput">Tag name</label>
                                <input type="text" required name="name" class="form-control" id="titleInput" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Icon for tag (30*30px, svg)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input required type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
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
