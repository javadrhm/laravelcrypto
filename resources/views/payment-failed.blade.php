@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
            <div class="text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m6.938-4a9.005 9.005 0 01-3.328 5.663m-2.348-1.52a7.5 7.5 0 00-.384-11.317m2.732 3.671a9.014 9.014 0 013.327 5.663m0 0a9.003 9.003 0 01-9.548 8.392 9.003 9.003 0 01-5.663-3.328m6.663-2.732a7.5 7.5 0 00.384 11.317m-2.732-3.671a9.014 9.014 0 01-3.328-5.663" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mt-4">Payment Failed</h1>
            <p class="text-gray-600 mt-2">
                Oops! Something went wrong with your payment. Please try again or contact support if the problem persists.
            </p>

            <div class="mt-6">
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m4 4h5m-4-4h5m0 0l-4 4m0-8l4 4m-5 4v4a4 4 0 01-8 0v-4m0 0a4 4 0 11-8 0v-4m0 0a4 4 0 118 0v4" />
                    </svg>
                    Back to Home
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('packages.index') }}" class="inline-flex items-center px-6 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m0 0l-6 6m6-6v12" />
                    </svg>
                    Retry Payment
                </a>
            </div>
        </div>
    </div>

@endsection
