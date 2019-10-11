<section class="feedback-section">
    <div class="container-fluid">
        <div class="row no-gutters align-items-center">
            @if($reviews_video)
                <div class="col-xl-7">
                    <div class="video-feedback" data-youtube="{{$reviews_video->video}}"></div>
                </div>
            @endif
            <div class="col-xl-5 d-flex flex-column  justify-content-center">
                <div class="texting-feedback flex-grow-1">
                    <h3 class="mb-4">відгуки наших пацієнтів</h3>

                    <div class="texting-slider">
                        @foreach ($reviews as $review)
                        <div class="texting-slider__item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="avatar"
                                         style="background-image: url({{$review->getFirstMedia('review')->getFullUrl()}})"></div>
                                </div>
                                <div class="col d-flex flex-column justify-content-center">
                                    <p class="text">{!! $review->content->body!!}</p>
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

                    <div class="row align-items-center mt-5">
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
                                <div class="texting-slider-counter">
                                    .
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-secondary w-100"><span>@lang('common.main.read_reviews')</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="appointment d-flex flex-column align-items-center justify-content-center modal-btn"
           style="background-image: url(../images/appointment-bg.jpg)">
            <h2 class="appointment__title">@lang('common.feedback.title')</h2>
            <p class="appointment__text">@lang('common.feedback.description')</p>
            <p class="appointment__link mt-4" href="#">
                @lang('common.feedback.btn')
                <svg width="20" height="6">
                    <use xlink:href="#arrow-link"></use>
                </svg>
            </p>
        </a>
    </div>
</section>