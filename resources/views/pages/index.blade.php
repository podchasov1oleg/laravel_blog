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
                <div class="col-md-3">
                    <div class="portfolio-item">
                        <img class="portfolio-img" src="https://via.placeholder.com/255x190" alt="">
                        <a href="#" class="button">
                            К портфолио
                        </a>
                        <a href="#" class="h4 item-header">Заголовок элемента</a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A vitae tempore dolor aut numquam nisi earum voluptate itaque reiciendis, corporis alias qui veritatis nobis quae ut maiores? Illo, nobis ab!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="portfolio-item">
                        <img class="portfolio-img" src="https://via.placeholder.com/255x190" alt="">
                        <a href="#" class="button">
                            К портфолио
                        </a>
                        <a href="#" class="h4 item-header">Заголовок элемента</a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam saepe delectus dolore cumque ratione animi nulla pariatur voluptatem perferendis! Atque, odit? Suscipit ratione id ut.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="portfolio-item">
                        <img class="portfolio-img" src="https://via.placeholder.com/255x190" alt="">
                        <a href="#" class="button">
                            К портфолио
                        </a>
                        <a href="#" class="h4 item-header">Заголовок элемента</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet repudiandae alias optio ducimus beatae, aliquam eaque. Error unde accusantium dicta voluptate ad sed ducimus cum placeat laboriosam? Nesciunt ipsum perspiciatis, sed commodi iste repellendus corporis.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="portfolio-item">
                        <img class="portfolio-img" src="https://via.placeholder.com/255x190" alt="">
                        <a href="#" class="button">
                            К портфолио
                        </a>
                        <a href="#" class="h4 item-header">Заголовок элемента</a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio pariatur expedita sapiente quos commodi, eligendi laborum ipsum eos deleniti natus esse repudiandae. Ab ipsum hic vero ut tempora?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="advantages bg-orange">
        <h3>Сотрудничая с нами вы приобретаете</h3>
        <div class="container">
            <div class="my-slider">
                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/award.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">Заголовок преимущества</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/agreement.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">Заголовок преимущества</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/money.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">Заголовок преимущества</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="adv-item">
                        <div class="img-rounded">
                            <img src="{{asset('assets/img/icons/shield.svg')}}" alt="" class="svg">
                        </div>
                        <a href="" class="h4 item-header">Заголовок преимущества</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea officia laboriosam delectus cumque deserunt
                            impedit mollitia voluptatum aliquid! Laboriosam sit sint dolorum expedita eos. Sit, dolor? Culpa non soluta
                            quod.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us bg-light">
        <h3>Свяжитесь с нами</h3>
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
