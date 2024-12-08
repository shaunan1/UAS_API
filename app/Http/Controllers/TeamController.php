<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Project;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('project')->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('teams.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teams,email',
            'project_id' => 'required|exists:projects,id',
        ]);

        Team::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Team created successfully');
    }

    public function edit(Team $team)
    {
        $projects = Project::all();
        return view('teams.edit', compact('team', 'projects'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teams,email,' . $team->id,
            'project_id' => 'required|exists:projects,id',
        ]);

        $team->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Team updated successfully');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully');
    }
}
