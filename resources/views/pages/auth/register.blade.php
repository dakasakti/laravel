@extends('layouts.auth.app')

@section('content')
<section class="relative w-full h-full py-40 min-h-screen">
    <div
      class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
      style="background-image: url(/storage/img/register_bg_2.png)"
    ></div>
    <div class="container mx-auto px-4 h-full">
      <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-6/12 px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
          >
            <div class="rounded-t mb-0 px-6 py-6">
              <div class="text-center mb-3">
                <h6 class="text-blueGray-500 text-sm font-bold">
                  Sign up with
                </h6>
              </div>
              <div class="btn-wrapper text-center">
                <a href="{{ url('/auth/github') }}" class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150">
                    <img
                    alt="Github"
                    class="w-5 mr-1"
                    src="/storage/img/github.svg"
                  />Github
                </a>
                <a href="{{ url('/auth/google') }}" class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150">
                    <img
                    alt="google"
                    class="w-5 mr-1"
                    src="/storage/img/google.svg"
                  />Google
                </a>
              </div>
              <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="text-blueGray-400 text-center mb-3 font-bold">
                <small>Or sign up with credentials</small>
              </div>
              <form action="{{ route("register.store") }}" method="POST">
                @csrf
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Name
                  </label>
                  <input
                    type="text"
                    class="@error('name') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Name"
                    name="name"
                  />
                  @error('name')
                    <div class=" text-red-500 mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Email
                  </label>
                  <input
                    type="email"
                    class="@error('email') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email"
                    name="email"
                  />
                  @error('email')
                            <div class=" text-red-500 mt-1">{{ $message }}</div>
                          @enderror
                </div>

                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Password
                  </label>
                  <input
                    type="password"
                    class="@error('password') is-invalid @enderror border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Password"
                    name="password"
                  />
                  @error('password')
                            <div class=" text-red-500 mt-1">{{ $message }}</div>
                          @enderror
                </div>

                <div>
                  <label class="inline-flex items-center cursor-pointer">
                    <input
                      id="customCheckLogin"
                      type="checkbox"
                      class="@error('checkbox') is-invalid @enderror  form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                      name="checkbox" checked
                    />
                    <span
                      class="ml-2 text-sm font-semibold text-blueGray-600"
                    >
                      I agree with the
                      <a href="javascript:void(0)" class="text-pink-500">
                        Privacy Policy
                      </a>
                    </span>
                  </label>
                  @error('checkbox')
                  <div class=" text-red-500 mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div class="text-center mt-6">
                  <button
                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    type="submit"
                  >
                    Create Account
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.auth.footer')
  </section>
@endsection
