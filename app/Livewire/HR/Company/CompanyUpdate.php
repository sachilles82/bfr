<?php

namespace App\Livewire\HR\Company;

use App\Models\HR\Company;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class CompanyUpdate extends Component
{
    public Company $company;
    public $company_name;
    public $owner_id;
    public $created_by;
    public $industry_id;
    public $company_size;
    public $company_type;
    public $email;
    public $phone_1;
    public $phone_2;
    public $register_number;
    public $is_active;
    public $company_url;

    public function mount(Company $company): void
    {
        $this->company = $company;
        $this->company_name = $company->company_name;
        $this->owner_id = $company->owner_id;
        $this->created_by = $company->created_by;
        $this->industry_id = $company->industry_id;
        $this->company_size = $company->company_size;
        $this->company_type = $company->company_type;
        $this->email = $company->email;
        $this->phone_1 = $company->phone_1;
        $this->phone_2 = $company->phone_2;
        $this->register_number = $company->register_number;
        $this->is_active = $company->is_active;
        $this->company_url = $company->company_url;
    }

    public function updateCompany(): void
    {
//        $this->validate([
//            'name' => 'required|string|max:255',
//            'owner_id' => 'required|integer',
//            'created_by' => 'required|integer',
//        ]);

        $this->company->update([
            'company_name' => $this->company_name,
            'owner_id' => $this->owner_id,
            'created_by' => $this->created_by,
            'industry_id' => $this->industry_id,
            'company_size' => $this->company_size,
            'company_type' => $this->company_type,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'register_number' => $this->register_number,
            'company_url' => $this->company_url,

        ]);

        Flux::toast(
            variant: 'success',
            heading: 'Changes saved.',
            text: 'You can always update this in your settings.',
        );
    }

    public function render(): View
    {
        return view('livewire.hr.company.update');
    }
}
