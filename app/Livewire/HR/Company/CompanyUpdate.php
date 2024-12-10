<?php

namespace App\Livewire\HR\Company;

use App\Livewire\HR\Company\Helper\ValidateCompany;
use App\Models\HR\Company;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class CompanyUpdate extends Component
{
    use ValidateCompany;

    public Company $company;

    public $company_name = '';
    public $industry_id = '';
    public $company_size = '';
    public $company_type = '';
    public $email = '';
    public $phone_1 = '';
    public $phone_2 = '';
    public $register_number = '';
    public $company_url = '';

    public function mount(Company $company): void
    {
        $this->company = $company;
        $this->company_name = $company->company_name;
        $this->industry_id = $company->industry_id;
        $this->company_size = $company->company_size->value;
        $this->company_type = $company->company_type->value;
        $this->email = $company->email;
        $this->phone_1 = $company->phone_1;
        $this->phone_2 = $company->phone_2;
        $this->register_number = $company->register_number;
        $this->company_url = $company->company_url;
    }

    public function refreshCompanyData()
    {

        $this->company->refresh();
//        $this->mount(); // Optional: Um die Eigenschaften neu zu setzen
    }

    public function save(): void
    {
        $this->validate();

        $this->company->update([
            'company_name' => $this->company_name,
            'industry_id' => $this->industry_id,
            'company_size' => $this->company_size,
            'company_type' => $this->company_type,
            'company_url' => $this->company_url,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'register_number' => $this->register_number,
        ]);

        Flux::toast(
            text: 'You can always update this in your settings.',
            heading: 'Changes saved.',
            variant: 'success',
        );
    }

    public function render(): View
    {
        return view('livewire.hr.company.update');
    }
}
