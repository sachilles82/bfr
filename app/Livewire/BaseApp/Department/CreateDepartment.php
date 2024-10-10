<?php

namespace App\Livewire\BaseApp\Department;

use App\Livewire\BaseApp\Department\Helper\ValidateDepartment;
use App\Models\BaseApp\Department;
use Illuminate\View\View;
use Livewire\Component;

class CreateDepartment extends Component
{
    use ValidateDepartment;

//    public Department $department;
    public ?int $departmentId = null;
    public string $name = '';

    public function create(): void
    {
        $this->modal('department-add')->show();
    }


    public function save(): void
    {
        $this->validate();

        Department::create($this->only([
            'name'
        ]));


        $this->modal('department-add')->close();
        $this->dispatch('resetFilters');

        $this->reset('name');
    }

    public function render(): View
    {
        return view('livewire.base-app.department.create-department');
    }
}
