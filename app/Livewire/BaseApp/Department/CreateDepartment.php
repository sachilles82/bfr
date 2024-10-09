<?php

namespace App\Livewire\BaseApp\Department;

use App\Livewire\BaseApp\Department\Helper\ValidateDepartment;
use App\Models\BaseApp\Department;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Component;

class CreateDepartment extends Component
{
    use ValidateDepartment;

    public string $name = '';

    public bool $showCreateModal = false;

    #[Locked]
    public int $departmentId;
    public ?Department $department;


    public function edit(int $departmentId): void
    {
        $this->department = Department::where('id', $departmentId)->first();
        $this->showCreateModal = true;
        $this->$departmentId = $departmentId;

        $this->name = $this->department->name;
    }

    public function save(): void
    {
//        $this->validate();

        if (empty($this->department)) {
            Department::create([
                'name' => $this->name,
            ]);
        } else {
            $this->product->update([
                'name' => $this->name,
            ]);
        }

        $this->reset('department', 'name', 'showCreateModal');
    }

    public function delete(int $departmentId): void
    {
        Department::where('id', $departmentId)->delete();
    }


//    public function save()
//    {
//        Department::updateOrCreate(
//            ['id' => $this->departmentId],
//            [
//                'name' => $this->name,
//                'company_id' => auth()->user()->company_id,
//                'team_id' => auth()->user()->current_team_id,
//                'created_by' => auth()->id(),
//            ]
//        );
//    }

    public function render(): View
    {
        return view('livewire.base-app.department.create-department');
    }
}
