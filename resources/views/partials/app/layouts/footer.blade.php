<footer>
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row align-items-center text-center lg:text-left">
                <div class="col-xl-2 col-xxl">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" style="max-height: 160px" alt="">
                    </a>
                </div>
                <div class="col-xl">
                    <div class="footer-list">
                        <div class="my-1">
                            <a href="/">@lang('common.footer.main')</a>
                        </div>
                        <div class="my-1">
                            <a href="{{ route('app.directions.index') }}">@lang('common.footer.direction')</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="footer-list">
                        <div class="my-1">
                            <a href="{{ url('/about') }}">@lang('common.footer.about')</a>
                        </div>
                        <div class="my-1">
                            <a href="{{ url('/faq') }}">@lang('common.footer.questions')</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="footer-list">
                        <div class="my-1">
                            <a href="{{ route('app.articles.index') }}">@lang('common.footer.blog')</a>
                        </div>
                        <div class="my-1">
                            <a href="{{ url('/contacts') }}">@lang('common.footer.contacts')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-dev">
        <div class="footer-dev__item small">
        </div>
        <div class="footer-dev__item">
            <div class="footer-social d-flex align-items-center justify-content-around">
                <a href="{{app('settings')->facebook}}">FACEBOOK</a>
                <a href="{{app('settings')->instagram}}">INSTAGRAM</a>
                <a href="{{app('settings')->youtube}}">YOUTUBE</a>
                <a href="{{app('settings')->telegram}}">TELEGRAM</a>
            </div>
        </div>
    </div>
</footer>
