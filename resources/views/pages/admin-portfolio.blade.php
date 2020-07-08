@extends('layouts.admin')
@section('title', 'Portfolio List')
@section('content')
    <div class="row">
        <div class="col-12">
            @if(!empty(session('action')))
                <div class="callout callout-info">
                    <h5>The portfolio was {{!session('success') ? 'not' : ''}} {{session('action')}} successfully.</h5>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Portfolio table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Created at</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <td>{{$portfolio->id}}</td>
                                    <td style="max-width: 200px; overflow: hidden">{{$portfolio->title}}</td>
                                    <td style="max-width: 100px;"><input type="checkbox" {{$portfolio->active ? 'checked' : ''}} onclick="return false;" name="" id=""></td>
                                    <td style="max-width: 100px; overflow: hidden">{{$portfolio->created_at ?? "-"}}</td>
                                    <td>
                                        <a href="{{route('portfolio.show', ['id' => $portfolio->id])}}" class="btn btn-block btn-outline-primary btn-sm">See in public</a>
                                        <a href="{{route('portfolio.edit', ['id' => $portfolio->id])}}" class="btn btn-block btn-outline-secondary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-danger{{$portfolio->id}}">
                                            Delete portfolio
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
    @foreach($portfolios as $portfolio)
        <div class="modal fade" id="modal-danger{{$portfolio->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">You are going to delete portfolio with ID {{$portfolio->id}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{route('portfolio.delete', ['id' => $portfolio->id])}}" method="portfolio">
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
