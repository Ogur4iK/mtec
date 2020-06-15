@extends('layouts.app')

@section('content')
<section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(../img/nav-bg.jpg)">
    <div class="nav__inner">
        <h2 class="nav__title">Новости</h2>
        <nav class="nav__items">
            <a class="nav__link" href="/">Главная</a>
            <a class="nav__link" href="/news">Новости</a>
            <a class="nav__link nav__link--active" href="{{$news_item->slug}}">{{$news_item->title}}</a>
        </nav>
    </div>
</section>
<div class="container">
    <div class="news-page">
        <div class="news-page__title">{{$news_item->title}}</div>
        <div class="news-page__info">
            <div class="news-page__date-wrap">
                <svg class="news-page__icon">
                    <use xlink:href="#calendar"></use>
                </svg>
                <p class="news-page__date">{{$news_item->getDate()}}</p>
            </div>
            <div class="news-page__views-wrap">
                <svg class="news-page__icon">
                    <use xlink:href="#views"></use>
                </svg>
                <p class="news-page__views">{{$news_item->views}}</p>
            </div>
        </div>
        <div class="news-page__txt">
            {!! $news_item->content !!}
        </div>
        <div class="news-page__imgs">
            <img class="news-page__imgs-item" src="{{$news_item->getImage()}}"/>
        </div>
    </div>
</div>
@endsection
