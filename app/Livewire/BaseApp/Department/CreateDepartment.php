<?php

namespace App\Livewire\BaseApp\Department;

use App\Models\BaseApp\Department;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name;
    public $departmentId;


    public function mount($departmentId = null): void
    {
        if ($departmentId) {
            $this->name = Department::findorfail($departmentId)->name;
        }

    }

    public function save()
    {
        Department::updateOrCreate(
            ['id' => $this->departmentId],
            [
                'name' => $this->name,
                'company_id' => auth()->user()->company_id,
                'team_id' => auth()->user()->current_team_id,
                'created_by' => auth()->id(),
            ]
        );
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.base-app.department.create-department');
    }
}
