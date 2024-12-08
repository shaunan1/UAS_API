<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Mengembalikan semua task dengan proyek terkait
        return response()->json(Task::with('project')->get(), 200);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Membuat task baru
        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        // Mengembalikan detail task dengan proyek terkait
        return response()->json($task->load('project'), 200);
    }

    public function update(Request $request, Task $task)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'project_id' => 'sometimes|exists:projects,id',
        ]);

        // Memperbarui task yang dipilih
        $task->update($validated);

        return response()->json($task, 200);
    }

    public function destroy(Task $task)
    {
        // Menghapus task
        $task->delete();

        return response()->json(null, 204);
    }
}
