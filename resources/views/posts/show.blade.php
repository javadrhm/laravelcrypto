@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
    @if($post->featured_image)
        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover mb-4">
    @endif
    <div class="text-gray-700 mb-4">{!! nl2br(e($post->content)) !!}</div>
    <a href="{{ route('posts.index') }}" class="text-blue-500">Back to Blog</a>
</div>
@endsection
