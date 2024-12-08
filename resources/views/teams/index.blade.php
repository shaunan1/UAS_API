@extends('layouts.tapp')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Teams</h1>
    <a href="{{ route('teams.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Team</a>
    <table class="table-auto w-full mt-6 bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Project</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td class="border px-4 py-2">{{ $team->id }}</td>
                <td class="border px-4 py-2">{{ $team->name }}</td>
                <td class="border px-4 py-2">{{ $team->email }}</td>
                <td class="border px-4 py-2">{{ $team->project->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('teams.edit', $team) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST" class="inline">
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
