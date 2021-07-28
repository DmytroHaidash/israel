@extends('layouts.admin', ['page_title' => 'Настройки'])

@section('content')
    <section id="content">
        <div class="d-flex align-items-center mb-5">
            <h1 class="mb-0 h2">Настройки</h1>
        </div>
        <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Телефон 1</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{ old('phone') ?? $setting->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_additional">Телефон 2</label>
                        <input type="text" class="form-control" id="phone_additional" name="phone_additional"
                               value="{{ old('phone_additional') ?? $setting->phone_additional }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_additional_2">Телефон 3</label>
                        <input type="text" class="form-control" id="phone_additional_2" name="phone_additional_2"
                               value="{{ old('phone_additional_2') ?? $setting->phone_additional_2 }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email') ?? $setting->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                               value="{{ old('facebook') ?? $setting->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                               value="{{ old('instagram') ?? $setting->instagram }}">
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"
                               value="{{ old('youtube') ?? $setting->youtube }}">
                    </div>
                    <div class="form-group">
                        <label for="telegram">Telegram</label>
                        <input type="text" class="form-control" id="telegram" name="telegram"
                               value="{{ old('telegram') ?? $setting->telegram }}">
                    </div>
                </div>
            </div>

            <block-editor title="">
                @foreach(config('app.locales') as $lang)
                    <fieldset slot="{{ $lang }}">
                        <div class="form-group">
                            <label for="title">Заголовок для главного экрана на баннере</label>
                            <input id="title"
                                   type="text"
                                   name="{{$lang}}[title]"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   value="{{ old($lang.'.title') ?? $setting->translate('title', $lang) }}"
                                   required>
                            @if($errors->has('title'))
                                <div class="mt-1 text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Адресс фирмы</label>
                            <input id="address"
                                   type="text"
                                   name="{{$lang}}[content][address]"
                                   class="form-control"
                                   value="{{ old($lang.'.content') ?? $setting->translate('content', $lang)['address'] }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="work_time">График работы</label>
                            <input id="work_time"
                                   type="text"
                                   name="{{$lang}}[content][work_time]"
                                   class="form-control"
                                   value="{{ old($lang.'.content') ?? $setting->translate('content', $lang)['work_time'] }}"
                                   required>
                        </div>
                    </fieldset>
                @endforeach
            </block-editor>

            <fieldset>
                <h2 class="mt-2">Данные для карты</h2>

                <div class="form-group">
                    <label for="latitude">Широта</label>
                    <input id="latitude"
                           type="text"
                           name="latitude"
                           class="form-control"
                           value="{{ old('latitude') ?? $setting->latitude }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="longitude">Долгота</label>
                    <input id="address"
                           type="text"
                           name="longitude"
                           class="form-control"
                           value="{{ old('longitude') ?? $setting->longitude }}"
                           required>
                </div>
            </fieldset>

            <fieldset class="my-4">
                <label for="banner">Баннер для главной страницы</label>
                <multi-uploader
                    class="mt-4"
                    route="{{ route('admin.settings.images', ['collection' => 'banner']) }}"
                    :src="{{ json_encode($setting->getImagesList('banner')) }}"
                ></multi-uploader>
            </fieldset>

            {{--<fieldset class="my-4">
                <label for="banner">Награды</label>
                <multi-uploader
                    class="mt-4"
                    route="{{ route('admin.settings.images', ['collection' => 'awards']) }}"
                    :src="{{ json_encode($setting->getImagesList('awards')) }}"
                ></multi-uploader>
            </fieldset>--}}

            <fieldset class="my-4 col-md-4 col-lg-3 px-0">
                <label for="feedback">Изображение формы записи</label>
                <image-uploader name="feedback" ratio="125%"></image-uploader>
            </fieldset>

            {{--<image-uploader ratio="67%" name="banner" id="banner"
                            image-id="{{ optional($setting->getFirstMedia('banner'))->id }}"
                            src="{{ $setting->getFirstMediaUrl('banner') }}"></image-uploader>--}}

            <button class="btn btn-primary mt-2">Сохранить</button>
        </form>
    </section>
@endsection
