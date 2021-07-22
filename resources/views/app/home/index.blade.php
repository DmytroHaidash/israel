@extends('layouts.app', ['page_title' => trans('breadcrumb.main')])

@section('content')
    @include('partials.app.sections.intro')
    @includeWhen($departments->count(), 'partials.app.sections.directions')
    @includeWhen($pages->count(), 'partials.app.sections.pages')

    @includeWhen($team->count(),'partials.app.sections.team')
    @includeWhen($reviews->count(), 'partials.app.sections.reviews')
    @includeWhen($about->count(), 'partials.app.sections.about')
    @includeWhen($awards->count(), 'partials.app.sections.awards')
    @includeWhen($articles->count(), 'partials.app.sections.news')
    @include('partials.app.sections.contacts')
@endsection
