@extends('layouts.admin', ['app_title' => 'Отзывы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Отзывы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">
                Создать отзыв
            </a>
        </div>
    </div>
    @forelse($reviews as $review)
        <article class="item">
            <div class="item-id">{{ $review->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($review->hasMedia('review'))
                        <img src="{{ $review->getFirstMediaUrl('review', 'thumb') }}" class="rounded-circle"
                             alt="{{ $review->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $review->name }}">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="underline">
                            {{ $review->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $review->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.reviews.edit', $review) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.reviews.destroy', $review) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $review->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.reviews.destroy', $review) }}"
                          id="delete-form-{{ $review->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Отзывов пока нет!
    @endforelse
    {{ $reviews->links() }}
@endsection

@push('scripts')
    <script>
      function confirmDelete(id) {
        event.preventDefault();
        const agree = confirm('Уверены?');
        if (agree) {
          document.getElementById('delete-form-' + id).submit();
        }
      }
    </script>
@endpush
