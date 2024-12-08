@extends('layouts.tapp')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</a>
    <table class="table-auto w-full mt-6 bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Project</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td class="border px-4 py-2">{{ $task->id }}</td>
                <td class="border px-4 py-2">{{ $task->title }}</td>
                <td class="border px-4 py-2">{{ $task->project->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
