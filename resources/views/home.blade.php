@extends('layouts.app')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="w-full bg-gradient-to-br from-blue-50 to-indigo-100 relative">
        <div class="container mx-auto px-4 pt-24 lg:pt-32 flex flex-col lg:flex-row items-center">
            <div class="w-full lg:w-1/2 text-center lg:text-left z-10 mb-16">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 leading-tight">
                    Unlock the Power of Crypto Trading Intelligence
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Leverage advanced AI-driven insights, real-time market analysis, and personalized trading strategies.
                </p>

                <div class="flex space-x-4 justify-center lg:justify-start">
                    <a href="#packages" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition transform hover:-translate-y-1 shadow-lg">
                        Explore Packages
                    </a>
                    <a href="{{ route('assistant.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg border border-blue-200 hover:bg-blue-50 transition transform hover:-translate-y-1 shadow-md">
                        Try Assistant
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-1/2 mt-12 lg:mt-0">
                <img src="https://plus.unsplash.com/premium_photo-1681400592810-f5e452af17c5?q=80&w=2079&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                     alt="Crypto Trading Dashboard"
                     class="rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="w-full bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
                Why Choose Crypto Assistant?
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $features = [
                        [
                            'icon' => 'https://cdn-icons-png.flaticon.com/512/5028/5028934.png',
                            'title' => 'AI-Powered Analysis',
                            'description' => 'Advanced machine learning algorithms provide deep market insights.'
                        ],
                        [
                            'icon' => 'https://cdn-icons-png.flaticon.com/512/5374/5374104.png',
                            'title' => 'Real-Time Tracking',
                            'description' => 'Instant updates and alerts for cryptocurrency market movements.'
                        ],
                        [
                            'icon' => 'https://cdn-icons-png.flaticon.com/512/1170/1170459.png',
                            'title' => 'Personalized Strategies',
                            'description' => 'Tailored trading recommendations based on your risk profile.'
                        ]
                    ]
                @endphp

                @foreach($features as $feature)
                <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 text-center">
                    <img src="{{ $feature['icon'] }}" alt="{{ $feature['title'] }}" class="w-20 h-20 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-3">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Packages Section -->
    <div id="packages" class="w-full py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
                Our Trading Packages
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $packages = [
                        [
                            'name' => 'Starter Pack',
                            'price' => 49.99,
                            'description' => 'Perfect for beginners looking to start their crypto trading journey.',
                            'features' => [
                                'Basic AI Analysis',
                                'Weekly Market Reports',
                                'Email Support',
                                'Limited Trading Insights'
                            ],
                            'best_for' => 'New Traders'
                        ],
                        [
                            'name' => 'Pro Trader',
                            'price' => 99.99,
                            'description' => 'Advanced package for serious traders seeking comprehensive insights.',
                            'features' => [
                                'Advanced AI Analysis',
                                'Daily Market Reports',
                                'Priority Email & Chat Support',
                                'Real-Time Trading Signals',
                                'Risk Management Tools'
                            ],
                            'best_for' => 'Experienced Traders',
                            'recommended' => true
                        ],
                        [
                            'name' => 'Ultimate Crypto',
                            'price' => 199.99,
                            'description' => 'The most comprehensive package for professional traders and investors.',
                            'features' => [
                                'Premium AI Analysis',
                                'Hourly Market Updates',
                                '24/7 Dedicated Support',
                                'Advanced Trading Signals',
                                'Personalized Strategy Consultation',
                                'Portfolio Optimization'
                            ],
                            'best_for' => 'Professional Investors'
                        ]
                    ]
                @endphp

                @foreach($packages as $index => $package)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition hover:scale-105 hover:shadow-2xl {{ $package['recommended'] ?? false ? 'border-2 border-blue-500' : '' }}">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-800">{{ $package['name'] }}</h3>
                            @if(isset($package['recommended']))
                                <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">Recommended</span>
                            @endif
                        </div>
                        <p class="text-gray-600 mb-4">{{ $package['description'] }}</p>
                        <div class="text-3xl font-bold text-blue-600 mb-4">${{ number_format($package['price'], 2) }}/month</div>

                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-2">Best for:</h4>
                            <p class="text-gray-600">{{ $package['best_for'] }}</p>
                        </div>

                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-2">Package Features:</h4>
                            <ul class="space-y-2">
                                @foreach($package['features'] as $feature)
                                    <li class="flex items-center">
                                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L 19 7"></path>
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <a href="{{ route('payment', ['package' =>   $loop->index +1 ]) }}"
                           class="w-full block text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                            Select Package
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12">What Our Users Say</h2>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        [
                            'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg',
                            'name' => 'John Smith',
                            'quote' => 'Crypto Assistant has transformed my trading strategy. Highly recommended!'
                        ],
                        [
                            'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg',
                            'name' => 'Emily Chen',
                            'quote' => 'The AI insights are incredibly accurate. I\'ve seen significant improvements in my trades.'
                        ],
                        [
                            'avatar' => 'https://randomuser.me/api/portraits/men/85.jpg',
                            'name' => 'Michael Rodriguez',
                            'quote' => 'An essential tool for anyone serious about cryptocurrency trading.'
                        ]
                    ]
                @endphp

                @foreach($testimonials as $testimonial)
                <div class="bg-white/10 p-6 rounded-xl">
                    <img src="{{ $testimonial['avatar'] }}"
                         alt="{{ $testimonial['name'] }}"
                         class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-white/20">
                    <p class="italic mb-4">{{ $testimonial['quote'] }}</p>
                    <h4 class="font-semibold">{{ $testimonial['name'] }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-gray-100 py-16 text-center">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">
            Ready to Elevate Your Crypto Trading?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Join thousands of traders who trust Crypto Assistant for intelligent market insights.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 transition transform hover:-translate-y-1 shadow-lg">
                Get Started Now
            </a>
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-4 rounded-lg border border-blue-200 hover:bg-blue-50 transition transform hover:-translate-y-1 shadow-md">
                Login to Your Account
            </a>
        </div>
    </div>
</div>
@endsection
