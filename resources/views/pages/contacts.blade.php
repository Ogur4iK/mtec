@extends('layouts.app')

@section('content')
    <section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(img/nav-bg.jpg)">
        <div class="nav__inner">
            <h2 class="nav__title">Контакты</h2>
            <nav class="nav__items"><a class="nav__link" href="/">Главная</a><a class="nav__link nav__link--active" href="/contacts">Контакты</a></nav>
        </div>
    </section>
    <section class="contacts">
        <div class="container">
            <div class="cts__container">
                <div class="cts__block">
                    <h3 class="cts__block-title">Телефоны:</h3>
                    <ul class="cts__list">
                        <li class="cts__list-item"><a href="tel: (0176) 77-19-72">(0176) 77-19-72</a>
                            <p class="cts__phone-desc">Приемная директора</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-01-71">(0176) 77-01-71</a>
                            <p class="cts__phone-desc">Заместитель директора по учебной работе</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-01-51">(0176) 77-01-51</a>
                            <p class="cts__phone-desc">Заместитель директора по производственному обучению</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-18-73">(0176) 77-18-73</a>
                            <p class="cts__phone-desc">Методическая служба</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-14-26">(0176) 77-14-26</a>
                            <p class="cts__phone-desc">Дневное отделение</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-17-06">(0176) 77-17-06</a>
                            <p class="cts__phone-desc">Заочное отделение</p>
                        </li>
                        <li class="cts__list-item"><a href="tel: (0176) 77-40-53">(0176) 77-40-53</a>
                            <p class="cts__phone-desc">Общежитие</p>
                        </li>
                    </ul>
                </div>
                <div class="cts__block">
                    <h3 class="cts__block-title">Адрес:</h3>
                    <p class="cts__address">222310 Минская обл., г. Молодечно, пл. Центральная, 1</p>
                </div>
                <div class="cts__block">
                    <h3 class="cts__block-title">E-Mail:</h3>
                    <ul class="cts__list">
                        <li class="cts__list-item"><a href="mailoto: mtec@bks.by">mtec@bks.by</a></li>
                        <li class="cts__list-item"><a href="mailoto: mail@mtec.by">mail@mtec.by</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cts__map-container"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9aded1bbe8bb8ebf48df0cfb3445c8a4384e59e7cf9bdfd821e0e96b211f7533&amp;lang=ru_RU&amp;scroll=false"></script></div>
    </section>
@endsection
