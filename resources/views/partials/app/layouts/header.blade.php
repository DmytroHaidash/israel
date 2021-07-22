<form action="{{ route('app.locale') }}" method="post" id="locale" style="display: none">
    @csrf
    <input type="hidden" name="locale">
</form>
<header class="header">
    <div class="nav-btn d-inline-flex align-items-center justify-content-center">
        <svg class="nav-btn__icon" width="24" height="24">
            <use xlink:href="#nav-btn-icon"></use>
        </svg>
        <div class="nav-btn__title d-none d-xl-block">@lang('common.header.menu')</div>
    </div>

    <a href="{{ url('/') }}" class="header-logo">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </a>

    <div class="language d-none d-xl-block">
        <a href="#" class="language__active d-flex align-items-center justify-content-center text-uppercase">
            @if(app()->getLocale() == 'uk' )
                UA
            @else
                {{ app()->getLocale() }}
            @endif
        </a>

        <ul class="language__list">
            @foreach($locales as $locale)
                <li>
                    <a href="#{{ $locale }}" class="locales">
                        @if ($locale == 'uk')
                            UA
                        @else
                            {{ $locale }}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="header-contacts ml-auto d-none d-xl-flex align-items-center justify-content-center">
        <a href="#map" class="header-contacts__item d-inline-flex align-items-center">
            <svg class="img" width="15" height="15">
                <use xlink:href="#pin-icon"></use>
            </svg>
            {{app('settings')->content->address}}
        </a>
        <a href="tel:{{phone_link(app('settings')->phone)}}"
           class="header-contacts__item d-inline-flex align-items-center">
            <svg class="img" width="15" height="15">
                <use xlink:href="#phone-icon"></use>
            </svg>
            {{app('settings')->phone}}
        </a>
        <a href="tel:{{phone_link(app('settings')->phone_additional)}}"
           class="header-contacts__item d-inline-flex align-items-center">
            <svg class="img" width="15" height="15">
                <use xlink:href="#phone-icon"></use>
            </svg>
            {{app('settings')->phone_additional}}
        </a>
        @if (app('settings')->phone_additional_2)
            <a href="tel:{{phone_link(app('settings')->phone_additional_2)}}"
               class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#phone-icon"></use>
                </svg>
                {{app('settings')->phone_additional_2}}
            </a>
        @endif
    </div>

   {{-- <button class="btn btn-flag modal-btn text-uppercase">
        @lang('common.main.appointments')
    </button>--}}
    @include('partials.app.layouts.appointments-form')
</header>
