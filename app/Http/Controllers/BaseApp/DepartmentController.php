<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Controller;
use App\Models\BaseApp\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Department::class);

        return Department::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Department::class);

        $data = $request->validate([
            'name' => ['required'],
            'current_team_id' => ['required'],
        ]);

        return Department::create($data);
    }

    public function show(Department $department)
    {
        $this->authorize('view', $department);

        return $department;
    }

    public function update(Request $request, Department $department)
    {
        $this->authorize('update', $department);

        $data = $request->validate([
            'name' => ['required'],
            'current_team_id' => ['required'],
        ]);

        $department->update($data);

        return $department;
    }

    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);

        $department->delete();

        return response()->json();
    }
}
