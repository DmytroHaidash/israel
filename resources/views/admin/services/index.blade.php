@extends('layouts.admin', ['app_title' => 'Услуги и цены'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Услуги и цены</h1>
        <div class="ml-3">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                Создать новую услугу
            </a>
        </div>
    </div>
    @forelse($services as $service)
        <article class="item">
            <div class="item-id">{{ $service->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.services.edit', $service) }}" class="underline">
                            {{ $service->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $service->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.services.destroy', $service) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $service->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.services.destroy', $service) }}"
                          id="delete-form-{{ $service->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Услуги пока не созданы!
    @endforelse
    {{ $services->links() }}
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
