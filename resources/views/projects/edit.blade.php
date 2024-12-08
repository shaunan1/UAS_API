@extends('layouts.tapp')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" value="{{ $project->name }}" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Description</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded">{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
