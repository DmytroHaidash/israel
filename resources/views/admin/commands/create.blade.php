@extends('layouts.admin', ['app_title' => 'Новый работник'])

@section('content')
    <section>
        <form action="{{ route('admin.commands.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новый работник">
                        @foreach(config('app.locales') as $lang)

                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">ФИО</label>
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

                                <div class="form-group">
                                    <label for="description">Должность</label>
                                    <input id="description"
                                           type="text"
                                           name="{{$lang}}[content][description]"
                                           class="form-control{{ $errors->has('content.description') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.content.description') }}"
                                           required>
                                    @if($errors->has('content.description'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('content.description') }}
                                        </div>
                                    @endif
                                </div>
                                <label for="body">Описание</label>
                                <wysiwyg class="mb-0" id="body"
                                         content="{{ old('body') }}"
                                         name="{{$lang}}[content][body]"
                                         label="Описание"></wysiwyg>
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
                    <image-uploader name="command" ratio="67%"></image-uploader>
                </div>
            </div>
            <div class="mt-4">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="show_on_home"
                               type="checkbox" id="show_on_home">
                        <label class="custom-control-label" for="show_on_home">
                            Показывать на главной
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
