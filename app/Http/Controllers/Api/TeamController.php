<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(Team::with('project')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teams,email',
            'project_id' => 'required|exists:projects,id',
        ]);

        $team = Team::create($validated);

        return response()->json($team, 201);
    }

    public function show(Team $team)
    {
        return response()->json($team->load('project'), 200);
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:teams,email,' . $team->id,
            'project_id' => 'sometimes|exists:projects,id',
        ]);

        $team->update($validated);

        return response()->json($team, 200);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(null, 204);
    }
}
