@extends('layouts.default')
@section('title', $portfolio->title)
@section('content')
    <section class="news-sect bg-light">
        <div class="container">
            <h1 class="inner-h1">{{$portfolio->title}}</h1>
            <h2>{{$portfolio->intro}}</h2>
            <div class="row">
                <div class="col-lg-9 news-detail">
                    <div class="portfolio-img-slider">
                        @foreach($images as $image)
                        <div class="news-item detail">
                            <img src="{{$image->src}}" alt="{{$image->src}}">
                        </div>
                        @endforeach
                    </div>

                    <hr>
                    {{$portfolio->body}}
                </div>
                @include('partials.tags')
            </div>
        </div>
    </section>
@endsection
