@extends('layouts.tapp')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Project</label>
            <select name="project_id" class="w-full px-4 py-2 border rounded">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
