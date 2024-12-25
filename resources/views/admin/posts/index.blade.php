@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Manage Posts</h1>

    <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Create New Post
    </a>

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 text-left">Title</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="border-b">
                <td class="p-3">{{ $post->title }}</td>
                <td class="p-3">{{ $post->status }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection
