@extends('layouts.admin', ['app_title' => 'Статьи к проектам'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Статьи к проектам</h1>
        <div class="ml-3">
            <a href="{{ route('admin.directions.create') }}" class="btn btn-primary">
                Создать новую статью
            </a>
        </div>
    </div>
    @forelse($directions as $direction)
        <article class="item">
            <div class="item-id">{{ $direction->order_no }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($direction->hasMedia('direction'))
                        <img src="{{ $direction->getFirstMediaUrl('direction', 'thumb') }}" class="rounded-circle"
                             alt="{{ $direction->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $direction->name }}">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.directions.edit', $direction) }}" class="underline">
                            {{ $direction->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $direction->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.directions.edit', $direction) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.directions.destroy', $direction) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $direction->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.directions.destroy', $direction) }}"
                          id="delete-form-{{ $direction->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Статьи к проектам пока не созданы пока не созданы!
    @endforelse
    {{ $directions->links() }}
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
