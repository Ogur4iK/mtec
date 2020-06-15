@extends('layouts.app')

@section('content')
    <section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(img/nav-bg.jpg)">
        <div class="nav__inner">
            <h2 class="nav__title">Новости</h2>
            <nav class="nav__items">
                <a class="nav__link" href="/">Главная</a>
                <a class="nav__link nav__link--active" href="/news">Новости</a>
            </nav>
        </div>
    </section>
    <div class="container">
        <div class="news-arch">
            <div class="news-arch__inner">
                @if(!$news->isEmpty())
                    @foreach($news as $news_item)
                        <div class="news-arch__item">
                            <div class="news-arch__item-img-wrap">
                                <a class="news-arch__item-img-link" href="news/{{$news_item->slug}}"></a>
                                <div class="news-arch__item-img-hover"></div>
                                <img class="news-arch__item-img" src="{{$news_item->getImage()}}"/>
                            </div>
                            <div class="news-arch__content">
                                <a class="news-arch__title-link" href="news/{{$news_item->slug}}">{{$news_item->title}}</a>
                                <p class="news-arch__txt">{{$news_item->description}}</p>
                                <div class="news-arch__item-info">
                                    <p class="news-arch__item-date">{{$news_item->getDate()}}</p>
                                    <div class="news-arch__item-views-wrap">
                                        <svg class="news-arch__icon">
                                            <use xlink:href="#views"></use>
                                        </svg>
                                        <p class="news-arch__item-views">{{$news_item->views}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$news->onEachSide(1)->links()}}
                @else
                    <p class="news-page__title">Новости отсутствуют</p>
                @endif
            </div>
        </div>
    </div>
@endsection
