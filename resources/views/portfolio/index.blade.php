@extends('layouts.main.app')

@section('content')
    <main class="text-center">
        <h1>This is main page</h1>

    @if (5 < 10)
        <img src="{{ asset("storage/banner.jpg") }}" alt="image" class="mx-auto">
    @endif

    @unless (empty($name))
        <h2>{{ $name }}</h2>
    @endunless

    @empty($name)
        <h2>Name is empty</h2>
    @endempty

    @isset($name)
        <h2>Name has been set</h2>
    @endisset

    @switch($name)
        @case("dakasakti")
            <h2>Welcome, {{ $name }}</h2>
            @break
        @default
            <h2>Welcome, Admin!</h2>
    @endswitch

    <div class="row">
        @for ($i = 1; $i <= 5; $i++)
            <div class="col">Column {{ $i }}</div>
        @endfor
    </div>

    <ul>
        @foreach ($names as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <ul>
       @forelse ($names as $item)
            <li>{{ $item }}</li>
       @empty
            <li>There are no names!</li>
       @endforelse
    </ul>
    </main>
@endsection

@push('scripts')
    <script></script>
@endpush
