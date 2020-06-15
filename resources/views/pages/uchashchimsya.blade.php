@extends('layouts.app')

@section('content')
    <section class="nav" style="background-image: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 17.16%), linear-gradient(180deg, rgba(0, 0, 0, 0) 47.94%, #000000 100%), url(img/students/stud-bg.jpg)">
        <div class="nav__inner">
            <h2 class="nav__title">Учащимся</h2>
            <nav class="nav__items"><a class="nav__link" href="/">Главная</a><a class="nav__link nav__link--active" href="/uchashchimsya">Учащимся</a></nav>
        </div>
    </section>
    <div class="container">
        <section class="sched">
            <h2 class="sched__title">Скорректированное Расписание</h2>
            <div class="sched__inner">
                @if($studentsScheduleExists || $teachersScheduleExists)
                    @if($studentsScheduleExists)
                        <div class="sched__item"><a class="sched__item-link" target="_blank" href="uploads/schedules/students_schedule.pdf"></a>
                            <div class="sched__item-wrap">
                                <svg class="sched__item-icon">
                                    <use xlink:href="#student"></use>
                                </svg>
                                <h3 class="sched__item-title">Расписание для 1-4 курсов в разрезе групп</h3>
                            </div>
                        </div>
                    @endif
                    @if($teachersScheduleExists)
                        <div class="sched__item"><a class="sched__item-link" target="_blank" href="uploads/schedules/teachers_schedule.pdf"></a>
                            <div class="sched__item-wrap">
                                <svg class="sched__item-icon">
                                    <use xlink:href="#teacher"></use>
                                </svg>
                                <h3 class="sched__item-title">Расписание для 1-4 курсов в разрезе преподавателей</h3>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="news-page__title">Расписание не загружено</p>
                @endif
            </div>
        </section>
        <section class="abs">
            <h2 class="abs__title">Заочное отделение</h2>
            <ul class="abs__list">
                <h3 class="abs__subtitle">Календарь экзаменационных сессий на заочном отделении</h3>
                <li class="abs__list-item"><a href="#">Календарь</a></li>
            </ul>
            <ul class="abs__list">
                <h3 class="abs__subtitle">Расписание</h3>
                <li class="abs__list-item"><a href="#">29.05.2020 - Журнал учёта домашних контрольных работ 2019-2020 г</a></li>
                <li class="abs__list-item"><a href="#">Программа государственных экзаменов (заочное отделение, специальность "Коммерческая деятельность")</a></li>
                <li class="abs__list-item"><a href="#">Программа государственных экзаменов (заочное отделение, специальность "Бухгалтерский учёт, анализ и контроль")</a></li>
                <li class="abs__list-item"><a href="#">Расписание для П1</a></li>
                <li class="abs__list-item"><a href="#">Списки учащихся первого курса заочного отделения 2019-2020 учебный год</a></li>
            </ul>
        </section>
        <section class="day">
            <h2 class="day__title">Дневное отделение</h2>
            <h3 class="day__subtitle">Расписание</h3><img class="day__img" src="img/students/s1.jpg" alt="Расписание"/><img class="day__img" src="img/students/s2.jpg" alt="Расписание"/>
            <h3 class="day__subtitle">Расписание звонков</h3><img class="day__img" src="img/students/s3.jpg" alt="Расписание звонков"/>
            <h3 class="day__subtitle">Мониторинг учебной деятельности</h3><img class="day__img" src="img/students/s4.jpg" alt="Мониторинг учебной деятельности"/><img class="day__img" src="img/students/s5.jpg" alt="Расписание"/>
            <h3 class="day__subtitle">Нормативные документы</h3>
            <div class="day__txt">
                <p class="day__txt-item">Постановление совета министров Республики Беларусь от 11 июля 2011 г. № 941 &laquo;О некоторых вопросах среднего специального образования&raquo;</p>
                <p class="day__txt-item">Положение о практике учащихся, курсантов, осваивающих содержание образовательных программ среднего специального образования<a class="day__txt-item-link" href="#">(скачать)</a></p>
                <p class="day__txt-item">Рекомендации по оформлению прохождения производственной практики учащимися колледжа<a class="day__txt-item-link" href="#">(скачать)</a></p>
                <p class="day__txt-item">График проведения консультаций по субботам по технологической практике (специальности: Бухгалтерский учёт, анализ и контроль; Коммерческая деятельность (по направлениям)) для учащихся 3-го курса дневного отделения<a class="day__txt-item-link" href="#">(скачать)</a></p>
            </div><img class="day__img" src="img/students/s6.jpg" alt="График проведения консультаций"/>
        </section>
    </div>
@endsection
