@extends('layouts.default')
@section('content')
    <section class="news-sect bg-light">
        <div class="container">
            <h1 class="inner-h1">{{$post->title}}</h1>
            <h2>{{$post->intro}}</h2>
            <div class="row">
                <div class="col-9 news-detail">
                    <div class="news-item detail">
                        <img src="https://via.placeholder.com/795x447" alt="">
                    </div>
                    <hr>
                    <p>
                        {{$post->body}}
                    </p>
                </div>
                @include('partials.tags')
            </div>
        </div>
    </section>
@endsection
