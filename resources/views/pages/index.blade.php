@extends('layouts.app')
@section('content')
    <section class="intro" style="background-image:linear-gradient(180deg,#000 0,rgba(0,0,0,0) 17.16%),linear-gradient(180deg,rgba(0,0,0,0) 47.94%,#000 100%),url(img/index/bg.jpg)">
        <div class="container">
            <div class="intro__inner">
                <h1 class="intro__title">Мтэк</h1>
                <ul class="intro__social">
                    <li class="intro__social-item">
                        <a class="intro__soc" href="https://vk.com/mtecby" target="_blank">
                            <svg class="intro__soc-icon">
                                <use xlink:href="#icon-vk"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="intro__social-item">
                        <a class="intro__soc" href="https://twitter.com/by_mtec" target="_blank">
                            <svg class="intro__soc-icon">
                                <use xlink:href="#icon-twitter"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="intro__social-item">
                        <a class="intro__soc" href="https://www.youtube.com/channel/UC4B6JgjjmeZrhMnGlAx9bew" target="_blank">
                            <svg class="intro__soc-icon">
                                <use xlink:href="#icon-youtube"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="intro__bot">
                    <p class="intro__bot-txt">У нас только престижные специальности!</p>
                    <a class="intro__bot-link" href="/history">История</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        @if(!$news->isEmpty())
            <div class="container">
                <h2 class="news__title">Последние новости</h2>
                <div class="news__inner">
                    @foreach($news as $news_item)
                        <div class="news__item">
                        <a class="news__item-link" href="/news/{{$news_item->slug}}"></a>
                        <img class="news__item-img" src="{{$news_item->getImage()}}">
                        <div class="news__item-content">
                            <p class="news__item-txt">{{$news_item->getTitle()}}</p>
                            <div class="news__item-info">
                                <div class="news__item-date">
                                    <p class="news__item-date-day">{{$news_item->created_at->day}}</p>
                                    <p class="news__item-date-month">{{$news_item->getMonth()}}</p>
                                    <p class="news__item-date-year">{{$news_item->created_at->year}}</p>
                                </div>
                                <div class="news__item-views-wrap">
                                    <svg class="news-icon">
                                        <use xlink:href="#views"></use>
                                    </svg>
                                    <p class="news__item-views">{{$news_item->views}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="news__archive-wrap"><a class="news__archive-link" href="/news">Архив новостей</a></div>
            </div>
        @endif
    </section>
    @if(!$specialties->isEmpty())
        <section class="spec" id="spec">
        <div class="container">
            <h2 class="spec__title">Наши специальности</h2>
            <div class="spec__inner">
                @foreach($specialties as $speciality)
                    <div class="spec__item">
                        <div class="spec__item-wrap">
                            <a class="spec__item-link" href="/specialties/{{$speciality->slug}}"></a>
                            <div class="spec__item-front">
                                <img class="spec__item-icon" src="{{$speciality->getImage()}}">
                                <h3 class="spec__item-title">{{$speciality->name}}</h3></div>
                            <div class="spec__item-back">
                                @if($speciality->isReception())
                                    <p class="spec__item-txt">
                                        <span>Форма обучения: </span>
                                        <?php for ($i = 0; $i < count($speciality->getDescriptions()); $i++):
                                        $description = $speciality->getDescriptions()[$i];
                                        ?>
                                        {{$description->form}} ({{$description->education}})<?php echo $i < count($speciality->getDescriptions()) - 1 ? ';' : '.' ?>
                                        <?php endfor; ?>
                                    </p>
                                    <p class="spec__item-txt">
                                        <span>Срок обучения: </span>
                                        <?php for ($i = 0; $i < count($speciality->getDescriptions()); $i++):
                                        $description = $speciality->getDescriptions()[$i];
                                        ?>
                                        {{$description->short_period}} ({{$description->education}})<?php echo $i < count($speciality->getDescriptions()) - 1 ? ';' : '.' ?>
                                        <?php endfor; ?>
                                    </p>
                                    <p class="spec__item-txt"><span>Квалификация: </span> {{$speciality->qualification}}.</p>
                                @else
                                    <p class="spec__item-txt"><span>Набор не ведётся!</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(!$resources->isEmpty())
        <section class="res">
            <div class="container">
                <h2 class="res__title">Внешние ресурсы</h2>
                <div class="res__inner">
                    <div class="owl-carousel owl-theme" id="owl1">
                        @foreach($resources as $resource)
                            <div class="item"><img class="res__item-img" src="{{$resource->getImage()}}" alt="{{$resource->title}}">
                                <h4 class="res__item-title">{{$resource->title}}</h4>
                                <a class="res__item-link" href="{{$resource->url}}" target="_blank"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
