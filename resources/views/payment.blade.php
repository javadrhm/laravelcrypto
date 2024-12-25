@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
            <h1 class="text-2xl font-bold mb-4">Payment for {{ $package->name }}</h1>
            <p class="text-lg">Total: ${{ $package->price }}</p>
            <div class="mt-6 space-x-4">
                <form action="{{ route('payment.success') }}" method="POST">
                    @csrf
                    <x-primary-button type="submit">
                        Complete Payment
                    </x-primary-button>
                </form>
                <x-danger-button onclick="window.location='{{ route('payment.failed') }}'">
                    Cancel Payment
                </x-danger-button>
            </div>
        </div>
    </div>
@endsection
