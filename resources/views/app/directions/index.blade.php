@extends('layouts.app', ['page_title' => trans('breadcrumb.directions')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.directions.index')}}">@lang('breadcrumb.directions')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$article->title}}</li>
        </ul>
    </section>
    <section class="intro-page-section d-flex align-items-center">

        <div class="container-fluid">

            <div class="row align-items-center justify-content-center justify-content-xl-end">
                <div class="col-sm-8 col-lg-6 col-xl-6 h-100 order-xl-2 mb-4 mb-xl-0">
                    <img src="{{$category->getFirstMediaUrl('category')}}" alt="" class="intro-category-bg">
                </div>
                <div class="col-xl-4 order-xl-1">
                    <div class="intro-category">
                        <div class="section-decor d-none d-xl-block">
                            <img src="../images/about-img.svg" alt="">
                        </div>

                        <h2 class="intro-category__title">{{$category->title}}</h2>
                        <p class="intro-category__text">{{$category->content->description}}</p>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="navigation-section">
        <div class="container">
            <div class="navigation">
                <div class="navigation-slider">
                    @foreach($articles as $item)
                    <a href="{{route('app.directions.show', $item)}}" class="navigation-slider__item">
                        <div class="content">
                            <div class="content__img" style="background-image: url({{$item->getFirstMediaUrl('direction')}})"></div>
                            <h3 class="content__title">{{$item->title}}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="category-content-section">
        <div class="container">

            <h2 class="section-title-center mb-5">
                <span>{{$article->title}}</span>
            </h2>

            <div class="row">
                <div class="col order-xl-4 col-xxl-2">
                    <div class="cat-content-nav">
                        <h4 class="title">@lang('common.navigation')</h4>
                        {!!  $article->content->navigation!!}
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-9 order-xl-1">
                    <div class="cat-content">
                        {!! $article->content->body!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($methods->count(), 'partials.app.sections.methods')
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection