@extends('layouts.main.app')

@section('content')
<main>
    <div class="flex items-center justify-center min-h-screen p-5 bg-blue-100 min-w-screen">
        <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
            @if (Session()->has('message'))
            <h1 class="text-emerald-500">{{ session('message') }}</h1>
            @endif
            <h3 class="text-2xl">Thanks for signing up for {{ config('app.name') }}</h3>
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                </svg>
            </div>

            <p>We're happy you're here. Let's get your email address verified:</p>
            <div class="mt-4">
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-pink-500 active:bg-pink-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150">
                        Resend Verification Link</button>
                </form>


                <p class="mt-4 text-sm">If you’re having trouble clicking the "Verify Email Address" button, copy
                    and paste the URL into your web browser:
                    <a href="/" class="text-blue-600 underline">http://localhost:8000/email/verify/3/1ab7a09a3</a>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection
