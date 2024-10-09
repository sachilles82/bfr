<?php

namespace App\Livewire\BaseApp\Department;

use App\Livewire\BaseApp\Department\Helper\Searchable;
use App\Models\BaseApp\Department;
use App\Traits\Table\WithPerPagePagination;
use App\Traits\Table\WithSorting;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentTable extends Component
{
    use Searchable;
    use WithPerPagePagination;
    use WithSorting;

    public $selectedIds = [];
    public $idsOnPage = [];

    #[Locked]
//    public int $departmentId = 0;  // Set a default value to avoid initialization issues

//    public $name = '';

    #[On('created')]
    public function render()
    {
        $query = Department::query();
        $query->where('created_by', auth()->user()->id);

        $this->applySearch($query);

        // Ensure $departments is always a paginated result, even if empty
        $departments = $this->applySimplePagination($query);
        $this->idsOnPage = $departments->pluck('id')->toArray();

        return view('livewire.base-app.department.department-table', compact('departments'));
    }
}
