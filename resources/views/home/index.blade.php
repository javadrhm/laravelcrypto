<x-guest-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            <h1 class="text-3xl font-bold mb-6">Welcome</h1>
            <div class="space-x-4">
                <x-primary-button onclick="window.location='{{ route('login') }}'">
                    Sign In
                </x-primary-button>
                <x-primary-button onclick="window.location='{{ route('register') }}'">
                    Register
                </x-primary-button>
            </div>
        </div>
    </div>
</x-guest-layout>
