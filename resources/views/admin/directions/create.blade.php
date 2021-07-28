@extends('layouts.admin', ['app_title' => 'Новая статья'])

@section('content')
    <section>
        <form action="{{ route('admin.directions.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новая статья">
                        @foreach(config('app.locales') as $lang)

                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input id="title"
                                           type="text"
                                           name="{{$lang}}[title]"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.title') }}"
                                           required>
                                    @if($errors->has('title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <label for="body">Текст</label>
                                <wysiwyg class="mb-0" id="body"
                                         content="{{ old('body') }}"
                                         name="{{$lang}}[content][body]"
                                         label="Текст"></wysiwyg>
                            </fieldset>

                        @endforeach
                    </block-editor>

                    <div class="form-group mt-3">
                        <label for="category_id">Проекты</label>
                        <select class="form-control position-relative" name="categories[]" id="category_id" multiple required>
                            <option value="" disabled selected style='display:none;'>Выберите один или несколько проектов</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? ' selected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <image-uploader name="direction" ratio="67%"></image-uploader>
                </div>
            </div>
            <div class="mt-4">
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="published" value="0">
                        <input class="custom-control-input" name="published"
                               type="checkbox" value="1" id="published">
                        <label class="custom-control-label" for="published">
                            Опубликовать
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
