@extends('layouts.app')

@section('content')
<div class="px-4 py-5 flex-auto ct-docs-frame">
    <div class="relative flex flex-wrap justify-center ">
        <div class="w-full">
            <div class="py-12">
                <div class="mb-12 flex flex-wrap -mx-4 justify-center">
                    <div class="px-4 relative w-full lg:w-8/12 text-center">
                        <h6 class="mb-2 font-bold uppercase text-emerald-500">Our latest blogposts</h6>
                        <h3 class="text-3xl font-bold mt-3 mb-1 text-blueGray-700">Check the news for this month</h3>
                        <p class="mt-2 mb-4 text-xl leading-relaxed text-blueGray-400">I always felt like I could do anything. That’s the main thing people are controlled by! Thoughts- their perception of themselves!</p>
                    </div>
                </div>
                <div class="items-center flex flex-wrap -mx-4">
                    <div class="px-4 relative w-full lg:w-3/12">
                        <div class="h-430-px overflow-hidden relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg transition-all duration-150 ease-in-out hover:z-1 hover:transform hover:scale-110 group rounded-lg mb-4">
                            <div class="absolute w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110 rounded-lg" style="background-image: url('https://demos.creative-tim.com/notus-design-system-pro/assets/img/guitar-play.jpg'); backface-visibility: hidden;"></div>
                            <div class="absolute w-full h-full bg-black opacity-50 rounded-lg"></div><a href="javascript:;">
                                <div class="absolute text-left p-6 bottom-0">
                                    <h6 class="text-xl leading-normal mb-0 text-white opacity-75">All the beautiful places</h6>
                                    <h5 class="text-2xl font-bold leading-tight mt-0 mb-2 text-white">Research by Bang &amp; Olufsen on city sounds and music</h5>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="px-4 relative w-full lg:w-3/12">
                        <div class="h-430-px overflow-hidden relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg transition-all duration-150 ease-in-out hover:z-1 hover:transform hover:scale-110 group rounded-lg mb-4">
                            <div class="absolute w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110 rounded-lg" style="background-image: url('https://demos.creative-tim.com/notus-design-system-pro/assets/img/sections/thomas.jpg'); backface-visibility: hidden;"></div>
                            <div class="absolute w-full h-full bg-black opacity-50 rounded-lg"></div><a href="javascript:;">
                                <div class="absolute text-left p-6 bottom-0">
                                    <h6 class="text-xl leading-normal mb-0 text-white opacity-75">Spectrum Boats</h6>
                                    <h5 class="text-2xl font-bold leading-tight mt-0 mb-2 text-white">Data Virtualization and Boats Startups</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="px-4 relative w-full lg:w-3/12">
                        <div class="h-430-px overflow-hidden relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg transition-all duration-150 ease-in-out hover:z-1 hover:transform hover:scale-110 group rounded-lg mb-4">
                            <div class="absolute w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110 rounded-lg" style="background-image: url('https://demos.creative-tim.com/notus-design-system-pro/assets/img/sections/ashim.jpg'); backface-visibility: hidden;"></div>
                            <div class="absolute w-full h-full bg-black opacity-50 rounded-lg"></div><a href="javascript:;">
                                <div class="absolute text-left p-6 bottom-0">
                                    <h6 class="text-xl leading-normal mb-0 text-white opacity-75">Flying on pandemic</h6>
                                    <h5 class="text-2xl font-bold leading-tight mt-0 mb-2 text-white">New Challenges when you want to fly to new areas</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="px-4 relative w-full lg:w-3/12">
                        <div class="h-430-px overflow-hidden relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg transition-all duration-150 ease-in-out hover:z-1 hover:transform hover:scale-110 group rounded-lg mb-4">
                            <div class="absolute w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110 rounded-lg" style="background-image: url('https://demos.creative-tim.com/notus-design-system-pro/assets/img/sections/dane.jpg'); backface-visibility: hidden;"></div>
                            <div class="absolute w-full h-full bg-black opacity-50 rounded-lg"></div><a href="javascript:;">
                                <div class="absolute text-left p-6 bottom-0">
                                    <h6 class="text-xl leading-normal mb-0 text-white opacity-75">Work from Home</h6>
                                    <h5 class="text-2xl font-bold leading-tight mt-0 mb-2 text-white">How meetings and behaviour are changing</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
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
