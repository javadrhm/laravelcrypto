@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Packages</h1>

        @if(session('message'))
            <div class="bg-yellow-100 p-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        @if($packages->isEmpty())
            <div class="bg-blue-100 p-4 rounded">
                No packages available at the moment.
            </div>
        @else
            <div class="grid md:grid-cols-3 gap-4">
                @foreach($packages as $package)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold">{{ $package->name }}</h2>
                        <p class="text-green-600 font-bold">${{ number_format($package->price, 2) }}</p>
                        <p>Duration: {{ $package->duration }} days</p>
                        <a href="{{ route('payment', $package) }}" class="mt-4 inline-block bg-blue-500 text-white rounded px-4 py-2">Select Package</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
