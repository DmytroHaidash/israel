<section id="direction-section" class="work-areas-section">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-end">
            <div class="col-xl-auto">
                <div class="areas-title">
                    <h2 class="title">@lang('common.main.direction')</h2>
                </div>
            </div>
            <div class="col-xl">
                <div class="areas-row d-flex align-items-center justify-content-center">

                    @foreach($departments->take(4) as $category)
                        @if(($loop->iteration % 2) != 0)
                            <div class="areas-col">
                                @endif
                                <a href="{{route('app.directions.show', $category)}}" class="areas-item lozad"
                                   data-background-image="{{$category->getFirstMediaUrl('direction', 'preview')}}">
                                    <div class="areas-item__content">
                                        <h6 class="title">{{ $category->title }}</h6>
                                        <div class="content">
                                            {!! remove_tags_direction($category->content->body) !!}
                                        </div>
                                    </div>
                                </a>
                                @if(($loop->iteration %2) == 0 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
