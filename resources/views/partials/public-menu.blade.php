<nav class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="navbar-nav mr-auto mt-lg-0">
            <a class="nav-item nav-link {{(\Route::currentRouteName() == 'public') ? 'active' : ''}}" href="{{route('public')}}">
                Главная
                @if(\Route::currentRouteName() == 'public')
                    <span class="sr-only">(current)</span>
                @endif
            </a>
            <a class="nav-item nav-link {{(\Route::currentRouteName() == 'portfolio.list') ? 'active' : ''}}" href="{{route('portfolio.list')}}">
                Портфолио
                @if(\Route::currentRouteName() == 'portfolio.list')
                    <span class="sr-only">(current)</span>
                @endif
            </a>
            {{--<a class="nav-item nav-link {{(\Route::currentRouteName() == 'public') ? 'active' : ''}}" href="{{route('public')}}">
                Услуги {{(\Route::currentRouteName() == 'public') ? '<span class="sr-only">(current)</span>' : ''}}
            </a>--}}
            <a class="nav-item nav-link {{(\Route::currentRouteName() == 'posts.list') ? 'active' : ''}}" href="{{route('posts.list')}}">
                Блог
                @if(\Route::currentRouteName() == 'posts.list')
                    <span class="sr-only">(current)</span>
                @endif
            </a>
            <a class="nav-item nav-link" href="{{route('public')}}#contact">
                Контакты
            </a>
        </div>
    </div>
</nav>
