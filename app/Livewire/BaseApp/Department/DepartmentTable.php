<?php

namespace App\Livewire\BaseApp\Department;

use App\Livewire\BaseApp\Department\Helper\Searchable;
use App\Models\BaseApp\Department;
use App\Traits\Table\WithPerPagePagination;
use App\Traits\Table\WithSorting;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentTable extends Component
{
    use Searchable, WithPerPagePagination, WithSorting;

    public $selectedIds = [];
    public $idsOnPage = [];

    public $departmentId;
    public $name = '';

    public function mount($departmentId = null): void
    {
        if ($departmentId) {
            $department = Department::findOrFail($departmentId);
            $this->departmentId = $department->id;
            $this->name = $department->name;
        }
    }

    public function remove($departmentId): void
    {
        $this->departmentId = $departmentId;
        $this->modal('department-remove')->show();
    }

    public function delete(): void
    {
        Department::destroy($this->departmentId);
        $this->modal('department-remove')->close();
    }

    public function edit($departmentId): void
    {
        $department = Department::findOrFail($departmentId);
        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->modal('department-edit')->show();
    }

    public function update(): void
    {
        Department::where('id', $this->departmentId)->update([
            'name' => $this->name,
        ]);
    }


    public function save(): void
    {
        $this->update();

        $this->modal('department-edit')->close();
    }

    #[On('resetFilters')]
    public function resetFilters(): void
    {
        $this->resetPage();
        $this->reset('search');
    }


    #[On('created')]
    public function render(): View
    {
        $query = Department::with(['creator', 'team','company']);

        $query->orderBy('created_at', 'desc');

        $this->applySearch($query);

        $departments = $this->applySimplePagination($query);

        $this->idsOnPage = $departments->pluck('id')->map(fn($id) => (string)$id)->toArray();

        return view('livewire.base-app.department.department-table',
            compact('departments')
        );
    }
}
