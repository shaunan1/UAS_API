@extends('layouts.tapp')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Project</label>
            <select name="project_id" class="w-full px-4 py-2 border rounded">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
