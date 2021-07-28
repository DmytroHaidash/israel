@extends('layouts.admin', ['app_title' => 'Проекты'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Проекты</h1>
        <div class="ml-3">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                Добавить проект
            </a>
        </div>
    </div>
    @forelse($categories as $category)
        <article class="item">
            <div class="item-id">{{ $category->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if ($category->hasMedia('category'))
                        <img src="{{ $category->getFirstMediaUrl('category', 'thumb') }}" class="rounded-circle"
                             alt="{{ $category->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $category->name }}">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="underline">
                            {{ $category->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $category->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    @includeIf('partials.admin.order', ['route' => 'admin.categories.order', 'item' => $category])
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.categories.destroy', $category) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $category->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.categories.destroy', $category) }}"
                          id="delete-form-{{ $category->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Проекты пока не созданы!
    @endforelse
    {{ $categories->links() }}
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
