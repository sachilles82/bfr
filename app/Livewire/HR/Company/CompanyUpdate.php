<?php

namespace App\Livewire\HR\Company;

use App\Models\HR\Company;
use Livewire\Component;

class CompanyUpdate extends Component
{
    public Company $company;
    public $name;
    public $owner_id;
    public $created_by;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->name = $company->name;
        $this->owner_id = $company->owner_id;
        $this->created_by = $company->created_by;
    }

    public function updateCompany()
    {
//        $this->validate([
//            'name' => 'required|string|max:255',
//            'owner_id' => 'required|integer',
//            'created_by' => 'required|integer',
//        ]);

        $this->company->update([
            'name' => $this->name,
            'owner_id' => $this->owner_id,
            'created_by' => $this->created_by,
        ]);

        session()->flash('message', 'Company updated successfully.');
    }

    public function render()
    {
        return view('livewire.hr.company.update');
    }
}
