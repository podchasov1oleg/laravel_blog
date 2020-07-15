@extends('layouts.admin')
@section('title', 'Список тегов')
@section('content')
    <div class="row">
        <div class="col-12">
            @if(!empty(session('action')))
                <div class="callout callout-info">
                    <h5>The tag was {{!session('success') ? 'not' : ''}} {{session('action')}} successfully.</h5>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tags table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Created at</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td style="vertical-align:middle;"><img src="{{$tag->icon}}" class="{{stripos($tag->icon, 'svg') ? 'svg' : ''}}" alt=""></td>
                                <td>{{$tag->created_at ?? "-"}}</td>
                                <td data-name="{{$tag->name}}" data-id="{{$tag->id}}" data-icon="{{$tag->icon}}">
                                    <button onclick="modal(this)" class="btn btn-block btn-outline-info btn-sm">Update tag</button>
                                    <button onclick="destroy(this)" data-toggle="modal" data-target="#modal-delete" class="btn btn-block btn-outline-danger btn-sm">Delete tag</button>
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
    <script>
        function modal(el) {
            var $el = $(el);
            var $modal = $('#exampleModal');
            $modal.find('h4 span').text($el.parent().data('id'));
            $modal.find('input[name=tag_name]').val($el.parent().data('name'));
            $modal.find('label.custom-file-label').text($el.parent().data('icon'));
            $modal.find('form').attr('action', '/admin/tags/' + $el.parent().data('id') + '/update');
            $modal.modal('toggle');
        }

        function destroy(el) {
            var $modal = $('#modal-delete'),
                $el = $(el);
            $modal.find('h4 span').text($el.parent().data('id'));
            $modal.find('form').attr('action', '/admin/tags/' + $el.parent().data('id') + '/destroy');
        }

    </script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Change tag <span></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name:</label>
                            <input type="text" required class="form-control" id="tag_name" name="tag_name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change tag</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">You are going to delete tag with ID <span></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer justify-content-between">
                    <form method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-danger">I am sure, delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
