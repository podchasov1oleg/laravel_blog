@extends('layouts.default')
@section('title', 'Главная')
@section('content')
    @if(!empty(session('response')))
        @dump(session('response'))
    @endif
    <section class="portfolio-list bg-light">
        <h3>Портфолио</h3>
        <div class="container">
            <div class="my-slider-portfolio">
                @foreach($portfolios as $portfolio)
                    <div class="col-md-3">
                        <div class="portfolio-item">
                            <img class="portfolio-img" src="{{$portfolio->images->first()->src ?? ''}}" alt="">
                            <a href="{{route('portfolio.list')}}" class="button">
                                К портфолио
                            </a>
                            <a href="{{route('portfolio.show', ['id' => $portfolio->id])}}" class="h4 item-header">{{$portfolio->title}}</a>
                            <p>{{$portfolio->intro}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="advantages bg-orange">
        <h3>Изучаемый стек технологий</h3>
        <div class="container">
            <div class="my-slider">
                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/iconfinder_10-html5_104494.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">HTML 5</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/iconfinder_256_Php_logo_4375347.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">PHP 7+</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/iconfinder_js_282802.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">JavaScript</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/iconfinder_terminal_1608947.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">Администрирование</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="post-list bg-light">
        <h3>Последние статьи</h3>
        <div class="container">
            <div class="my-slider-posts">
                <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-3">
                        <div class="news-item">
                            <a href="{{route('posts.show', ['id' => $post->id])}}">
                                <img src="{{$post->image}}" alt="">
                            </a>
                            <div class="tag">
                                <img src="{{$post->tag->icon}}" class="{{stripos($post->tag->icon, '.svg') ? 'svg' : ''}}" alt="">
                                <a href="{{route('posts.section', ['tag' => $post->tag->name])}}">{{$post->tag->name}}</a>
                            </div>
                            <h4>
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
    </section>

    <section class="contact-us bg-light">
        <h3>Предложите тему или пишите просто так</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="post" action="{{route('form.contact')}}" class="contact-form">
                        @csrf
                        <div class="name-field">
                            <label for="name">Имя</label>
                            <input type="text" name="USER_NAME" placeholder="Введите ваше имя" id="name">
                        </div>
                        <div class="mail-field">
                            <label for="mail">Почта</label>
                            <input type="email" name="USER_MAIL" placeholder="Введите вашу почту" id="mail">
                        </div>
                        <div class="mess-field">
                            <label for="text_mess">Сообщение</label>
                            <textarea name="USER_MESSAGE" placeholder="Введите сообщение" id="text_mess" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" class="button">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
