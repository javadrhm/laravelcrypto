@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Posts</h2>
            <a href="{{ route('admin.posts.index') }}" class="text-blue-500">Manage Posts</a>
        </div>
    </div>
</div>
@endsection
