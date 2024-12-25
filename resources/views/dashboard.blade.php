@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        @if(Auth::user()->hasActivePackage())
            <div>
                <h3 class="text-lg font-semibold">Your Active Package:</h3>
                @php
                    $activePackage = Auth::user()->activePackage();
                @endphp
                <p>Package: <strong>{{ $activePackage->package->name }}</strong></p>
                <p>Expires: <strong>{{ $activePackage->expires_at}}</strong></p>

                <!-- New View Assistant Button -->
                <a href="{{ route('assistant.index') }}" class="mt-4 inline-block bg-blue-500 text-white rounded px-4 py-2">
                    View Assistant
                </a>
            </div>
        @else
            <div>
                <h3 class="text-lg font-semibold">No Active Package</h3>
                <p>Purchase a package to access features</p>
            </div>
        @endif
    </div>
@endsection
