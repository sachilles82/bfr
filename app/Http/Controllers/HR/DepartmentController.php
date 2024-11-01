<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\HR\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use AuthorizesRequests;



    public function show(Department $department)
    {
//        $this->authorize('show', $department);
        return view('laravel.hr.department.show', compact('department'));
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
}
