@extends('layouts.app')

@section('content')
    @foreach ($posts as $item)
    <article class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800 mb-10">
        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
            <h1><a href="/blog/{{ $item->slug }}" >{{ $item->title }}</a></h1>
            <p class="text-lg font-medium">
                {{ $item->body }}
            </p>
          <figcaption class="font-medium">
            <div class="text-sky-500 dark:text-sky-400">
             {{ $item->user_id }}
            </div>
            <div class="text-slate-700 dark:text-slate-500">
              {{ $item->published_at ?? $item->updated_at }}
            </div>
          </figcaption>
        </div>
    </article>
    @endforeach
@endsection
