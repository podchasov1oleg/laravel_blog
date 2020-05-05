@extends('layouts.default')
@section('content')
    <section class="news-sect bg-light">
        <div class="container">
            <h1 class="inner-h1">Блог программиста</h1>
            <h2>Последние статьи</h2>
            <div class="row">
                <div class="col-lg-9 news-list">
                    <div class="container">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="{{$loop->first ? 'col-12' : 'col-lg-6'}}">
                                    <div class="news-item {{$loop->first ? 'first' : ''}}">
                                        <a href="{{route('posts.show', ['id' => $post->id])}}">
                                            <img src="https://via.placeholder.com/795x447" alt="">
                                        </a>
                                        <h4 class="bg-orange">
                                            <a href="{{route('posts.show', ['id' => $post->id])}}">
                                                {{$post->title}}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('partials.tags')
            </div>
        </div>
    </section>
@stop
