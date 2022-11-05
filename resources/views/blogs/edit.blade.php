@extends('layouts.dashboard.app')

@section('content')
<div class="w-full mb-12 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
        <div class="relative flex flex-col min-w-0 break-words w-full bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                  <h6 class="text-blueGray-700 text-xl font-bold">
                    Update Blog
                  </h6>
                  <a href="{{ route("blog.index") }}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">Back</a>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route("blog.update", $blog->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                  <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 mt-3">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password"
                        >
                          Title
                        </label>
                        <input
                          id="title"
                          type="text"
                          class="@error('title') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          name="title"
                          value="{{ $blog->title }}"
                          />
                          @error('title')
                            <div class=" text-red-500 mt-1">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4 mt-3">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password"
                        >
                          Slug
                        </label>
                        <input
                          id="slug"
                          type="text"
                          class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          name="slug"
                          value="{{ $blog->slug }}" disabled
                        />
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap">
                    <div class="w-full px-4 mt-3">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Image
                          </label>
                          <input
                            type="file"
                            class="@error('image') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            name="image"
                            />
                            @error('image')
                            <div class=" text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                  </div>
                  <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password"
                        >
                          Body
                        </label>
                        <textarea
                          type="text"
                          class="@error('body') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          rows="4" name="body"
                        >{{ $blog->body }}</textarea
                        >
                        @error('body')
                            <div class=" text-red-500 mt-1">{{ $message }}</div>
                          @enderror
                      </div>
                      <button type="submit" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">Update</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script>
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);
    });
</script>
@endpush
