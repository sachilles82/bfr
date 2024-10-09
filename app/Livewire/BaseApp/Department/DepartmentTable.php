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
    use Searchable;
    use WithPerPagePagination;
    use WithSorting;

    public $selectedIds = [];
    public $idsOnPage = [];


    // Felder für Bearbeiten und Erstellen
    public string $name = '';
    public bool $showEditModal = false;
    public ?Department $department = null;  // Für das aktuell bearbeitete Department
    public int $departmentId = 0;  // Für das Speichern der Department-ID bei der Bearbeitung

    // Methode zum Bearbeiten eines Departments
    public function edit(int $departmentId): void
    {
        // Lade das Department, das bearbeitet werden soll
        $this->department = Department::findOrFail($departmentId);
        $this->departmentId = $departmentId;

        // Fülle die Formularfelder
        $this->name = $this->department->name;
        $this->showEditModal = true; // Zeigt das Formular an
    }

    // Methode zum Speichern von Änderungen (Bearbeiten oder Erstellen)
    public function save(): void
    {
        // Validierung
//        $this->validate([
//            'name' => 'required|string|max:255',
//        ]);

        // Aktualisiere das Department, wenn vorhanden, oder erstelle ein neues
        if ($this->department) {
            $this->department->update([
                'name' => $this->name,
            ]);
        }

        // Zurücksetzen des Formulars und Modals schließen
        $this->reset('department', 'name', 'showEditModal');
        session()->flash('message', 'Department erfolgreich aktualisiert!');
    }



    #[On('created')]
    public function render(): View
    {
        $query = Department::with(['creator', 'team'])
            ->where('created_by', auth()->user()->id);

        $query->where('created_by', auth()->user()->id);

        $this->applySearch($query);

        $departments = $this->applySimplePagination($query);

        $this->idsOnPage = $departments->pluck('id')->toArray();

        return view('livewire.base-app.department.department-table',
            compact('departments')
        );
    }
}
