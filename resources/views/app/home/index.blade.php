@extends('layouts.app', ['page_title' => trans('breadcrumb.main')])

@section('content')
    @include('partials.app.sections.intro')
    @includeWhen($departments->count(), 'partials.app.sections.directions')
    @includeWhen($pages->count(), 'partials.app.sections.pages')
    @includeWhen($articles->count(), 'partials.app.sections.news')
    @includeWhen($team->count(),'partials.app.sections.team')
    @includeWhen($reviews->count(), 'partials.app.sections.reviews')
    @includeWhen($about->count(), 'partials.app.sections.about')
    @include('partials.app.sections.contacts')
@endsection
