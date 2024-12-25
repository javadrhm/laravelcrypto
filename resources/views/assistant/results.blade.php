@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Analysis Results for {{ $coin }} ({{ $timeframe }})</h1>

    @if(isset($analysisData))
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold mb-4">Technical Indicators</h2>

            @if(isset($analysisData['rsi']))
            <div class="mb-4">
                <h3 class="font-bold">RSI (Relative Strength Index)</h3>
                <p>Current RSI: {{ $analysisData['rsi']['value'] }}</p>
                <p>Trend: {{ $analysisData['rsi']['trend'] }}</p>
            </div>
            @endif

            @if(isset($analysisData['macd']))
            <div class="mb-4">
                <h3 class="font-bold">MACD (Moving Average Convergence Divergence)</h3>
                <p>MACD Line: {{ $analysisData['macd']['line'] }}</p>
                <p>Signal Line: {{ $analysisData['macd']['signal'] }}</p>
                <p>Histogram: {{ $analysisData['macd']['histogram'] }}</p>
            </div>
            @endif

            <!-- Add more indicators as needed -->
        </div>
    @else
        <p>No analysis data available.</p>
    @endif

    <a href="{{ route('assistant.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Back to Analysis
    </a>
</div>
@endsection
