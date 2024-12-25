@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Crypto Market Analysis</h1>

    <form id="analysis-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="coin">Select Coin</label>
            <select id="coin" name="coin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="BTC-USD">Bitcoin (BTC)</option>
                <option value="ETH-USD">Ethereum (ETH)</option>
                <option value="BNB-USD">Binance Coin (BNB)</option>
                <option value="XRP-USD">Ripple (XRP)</option>
                <option value="LTC-USD">Litecoin (LTC)</option>
                <!-- Add more coins as needed -->
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="interval">Select Interval</label>
            <select id="interval" name="interval" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="1m">1 Minute</option>
                <option value="5m">5 Minutes</option>
                <option value="15m">15 Minutes</option>
                <option value="1h">1 Hour</option>
                <option value="1d">1 Day</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" id="submit-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Analyze</button>
        </div>
    </form>

    <div id="analysis-results" class="hidden">
        <h2 class="text-2xl font-bold mb-4">Analysis Results</h2>
        <div id="results-content" class="bg-white shadow-md rounded p-4"></div>
    </div>

    <div id="error-message" class="hidden text-red-500 mt-4"></div>
</div>

<script>
    document.getElementById('analysis-form').addEventListener('submit', async function(event) {
        event.preventDefault();
        const coin = document.getElementById('coin').value;
        const interval = document.getElementById('interval').value;

        // Show loading state
        const resultsContent = document.getElementById('results-content');
        const errorMessage = document.getElementById('error-message');
        const submitButton = document.getElementById('submit-button');

        resultsContent.innerHTML = "Loading...";
        errorMessage.classList.add('hidden');
        document.getElementById('analysis-results').classList.remove('hidden');

        try {
            const response = await fetch('http://localhost:8001/analyze/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ symbol: coin, interval }),
            });

            const data = await response.json();
            if (response.ok) {
                resultsContent.innerHTML = JSON.stringify(data.analysis, null, 2);
            } else {
                errorMessage.innerHTML = "Error: " + data.detail;
                errorMessage.classList.remove('hidden');
            }
        } catch (error) {
            errorMessage.innerHTML = "An error occurred: " + error.message;
            errorMessage.classList.remove('hidden');
        } finally {
            // Reset loading state
            submitButton.disabled = false;
        }
    });
</script>
@endsection
