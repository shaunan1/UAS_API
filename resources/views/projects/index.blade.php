@extends('layouts.tapp')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Projects</h1>
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Project</a>
        <div class="mt-6">
            <table class="table-auto w-full bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td class="border px-4 py-2">{{ $project->id }}</td>
                        <td class="border px-4 py-2">{{ $project->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('projects.edit', $project) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
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
    </div>
    @endsection