@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="title" class="block mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-2">Content</label>
            <textarea id="content" name="content" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block mb-2">Status</label>
            <select id="status" name="status" class="w-full p-2 border rounded">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</button>
    </form>
</div>
@endsection
