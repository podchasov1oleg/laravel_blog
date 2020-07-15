@extends('layouts.default')
@section('title', 'Блог')
@section('content')
    <section class="news-sect bg-light">
        <div class="container">
            <h1 class="inner-h1">Блог программиста</h1>
            <h2>{{$title ?? "Последние статьи"}}</h2>
            <div class="row">
                <div class="col-lg-9 news-list">
                    <div class="container">
                        <div class="row">
                        @foreach($posts as $post)
                                <div class="{{$loop->first ? 'col-12' : 'col-lg-6'}}">
                                    <div class="news-item {{$loop->first ? 'first' : ''}}">
                                        <a href="{{route('posts.show', ['id' => $post->id])}}">
                                            <img src="{{asset($post->image)}}" alt="">
                                        </a>
                                        @isset($post->name)
                                            <div class="tag">
                                                @isset($post->icon)
                                                    <img src="{{asset($post->icon)}}" class="{{stripos($post->icon, 'svg') ? 'svg' : ''}}" alt="">
                                                @endisset
                                                {{--TODO добавить ссылку на раздел с тегом--}}
                                                <a href="{{route('posts.section', ['tag' => $post->name])}}">{{$post->name}}</a>
                                            </div>
                                        @endisset
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
