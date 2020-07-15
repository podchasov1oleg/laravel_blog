@extends('layouts.default')
@section('content')
    <section class="portfolio bg-light">
        <div class="container">
            <h1 class="inner-h1">Портфолио</h1>
            <h2>Список выполненных проектов</h2>
            <div class="row">
                @foreach($portfolios as $item)
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <a href="{{route('portfolio.show', ['id' => $item->id])}}">
                                <div class="item-img">
                                    @if($item->image != null)
                                        <img src="{{$item->image}}" alt="{{$item->image}}">
                                    @endif
                                </div>
                            </a>
                            <div class="item-caption">
                                <a href="{{route('portfolio.show', ['id' => $item->id])}}" class="h4 item-header">{{$item->title}}</a>
                                <p>{{$item->intro}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
