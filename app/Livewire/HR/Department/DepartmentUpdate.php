<?php

namespace App\Livewire\HR\Department;

use App\Models\HR\Department;
use Livewire\Component;
use Illuminate\View\View;

class DepartmentUpdate extends Component
{

    public $department;
    public $name;

    // Mount-Methode erhält das Department-Objekt
    public function mount(Department $department): void
    {
        $this->department = $department;
        $this->name = $department->name;
    }


    public function updateDepartment(): void
    {
        $this->department->update([
            'name' => $this->name,
        ]);

    }

    public function render():View
    {
        return view('livewire.hr.department.update');
    }
}
