@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($post->featured_image)
                    <img src="{{ Storage::url($post->featured_image) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-blue-600">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 text-sm">{{ $post->published_at }}</span>
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-500">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
</div>
@endsection
