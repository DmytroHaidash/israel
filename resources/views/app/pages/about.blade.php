@extends('layouts.app', ['page_title' => $page->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$page->title}}</li>
        </ul>
    </section>
    <section class="article-section">
        <div class="container-fluid">
            <div class="row justify-content-center justify-content-xl-end">

                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 offset-xxl-1 order-xl-2 mb-4 mb-xl-0">
                    <div class="about-galery">
                        <div class="about-slider">
                            @foreach($page->getMedia('uploads') as $img)
                                <div class="about-slider__item"
                                     style="background-image: url({{$img->getFullUrl()}})"></div>
                            @endforeach
                        </div>
                        <div class="about-slider-nav d-flex">
                            <div class="texting-arrow about-arrow--left">
                                <svg width="9" height="15">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                            </div>
                            <div class="texting-arrow about-arrow--right">
                                <svg width="9" height="15">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-5 mt-5 order-xl-1">
                    <div class="section-decor section-decor--article">
                        <img src="../images/about-img.svg" alt="">
                    </div>
                    <div class="about">
                        <h2 class="mb-4">{{$page->title}}</h2>
                        <div class="about-text">
                            {!! $page->content->body !!}
                        </div>
                        @if($reviews_video)
                            <div class="video-feedback" data-youtube="{{$reviews_video->video}}"></div>
                        @endif
                        @if($reviews->count())
                            <div class="texting-feedback p-0 my-5">
                                <h3 class="mb-4">@lang('common.main.review')</h3>
                                <div class="texting-slider">
                                    @foreach($reviews as $review)
                                        <div class="texting-slider__item">
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <div class="avatar"
                                                         style="background-image: url({{$review->getFirstMedia('review')->getFullUrl()}})"></div>
                                                </div>
                                                <div class="col d-flex flex-column justify-content-center">
                                                    <div class="text">{!! $review->content->body!!}</div>
                                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                                        <p class="date">{{ $review->created_at->formatLocalized('%d %B %Y') }}</p>
                                                        @if($review->facebook)
                                                            <a href="{{$review->facebook}}"
                                                               class="name d-flex align-items-center">
                                                                <svg width="15" height="15">
                                                                    <use xlink:href="#fb-icon"></use>
                                                                </svg>
                                                                {{$review->title}}
                                                            </a>
                                                        @else
                                                            {{$review->title}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row align-items-center mt-xl-5">
                                    <div class="col-xl-5">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="texting-slider-nav d-flex">
                                                <div class="texting-arrow texting-arrow--left">
                                                    <svg width="9" height="15">
                                                        <use xlink:href="#arrow-left"></use>
                                                    </svg>
                                                </div>
                                                <div class="texting-arrow texting-arrow--right">
                                                    <svg width="9" height="15">
                                                        <use xlink:href="#arrow-right"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="texting-slider-counter d-flex">
                                                <p id="texting-active" class="active-count">01</p>
                                                <p id="texting-active-all"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-secondary w-100 my-5 my-xl-0"><span>@lang('common.main.read_reviews')</span></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($team->count(),'partials.app.sections.team')
    @includeWhen($methods->count(), 'partials.app.sections.methods')
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection