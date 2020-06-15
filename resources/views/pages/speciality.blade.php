@extends('layouts.app')

@section('content')
    <section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(../img/spec/s1.jpg)">
        <div class="nav__inner">
            <h2 class="nav__title">{{$speciality->name}}</h2>
            <nav class="nav__items">
                <a class="nav__link" href="/">Главная</a>
                <a class="nav__link nav__link--active" href="/specialties/{{$speciality->slug}}">{{$speciality->name}}</a>
            </nav>
        </div>
    </section>
    <div class="container">
        <section class="specs">
            <h3 class="specs__info-code">{{$speciality->code}} «{{$speciality->name}}»</h3>
            <div class="specs__inner">
                @forelse($speciality->getDescriptions() as $description)
                    <div class="specs__item">
                    <div class="specs__item-title">
                        <p>{{$description->education}}</p>
                    </div>
                    <div class="specs__content">
                        @if($description->specialization)
                            <p class="specs__info"><span>Специализация:</span> {{$description->specialization}}.</p>
                        @endif
                        <p class="specs__info"><span>Форма обучения:</span> {{$description->form}}.</p>
                        <p class="specs__info"><span>Квалификация:</span> {{$speciality->qualification}}.</p>
                        <p class="specs__info"><span>Срок обучения:</span> {{$description->period}}.</p>
                        <p class="specs__info"><span>Вступительные испытания:</span> {{$description->tests}}.</p>
                        <p class="specs__info"><span>План приёма:</span> {{$description->plan}}.</p>
                    </div>
                </div>
                @empty
                    <p class="news-page__title">Описание отсутствует</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
