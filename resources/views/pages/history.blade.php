@extends('layouts.app')

@section('content')
    <section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(../img/nav-bg.jpg)">
        <div class="nav__inner">
            <h2 class="nav__title">История</h2>
            <nav class="nav__items">
                <a class="nav__link" href="/">Главная</a>
                <a class="nav__link nav__link--active" href="/history">История</a>
            </nav>
        </div>
    </section>
    <section class="history">
        <div class="container">
            @if(!$history->isEmpty())
                <div class="history__timeline">
                    <ul>
                        @foreach($history as $history_item)
                            <li>
                                <div class="history__timeline-time">
                                    <h4>{{$history_item->year}} год</h4>
                                </div>
                                <div class="history__timeline-content">
                                    <p>{{$history_item->description}}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="news-page__title">Записи об истории колледжа отсутствуют</p>
            @endif
        </div>
    </section>
@endsection
