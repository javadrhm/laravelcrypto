@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-2">Content</label>
            <textarea id="content" name="content" class="w-full p-2 border rounded">{{ $post->content }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block mb-2">Status</label>
            <select id="status" name="status" class="w-full p-2 border rounded">
                <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Post</button>
    </form>
</div>
@endsection
