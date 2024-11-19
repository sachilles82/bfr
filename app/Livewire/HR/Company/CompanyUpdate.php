<?php

namespace App\Livewire\HR\Company;

use App\Models\HR\Company;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class CompanyUpdate extends Component
{
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

    public function mount(): void
    {
        $this->company_name = $this->company->company_name;
        $this->industry_id = $this->company->industry_id;
        $this->company_size = $this->company->company_size;
        $this->company_type = $this->company->company_type;
        $this->email = $this->company->email;
        $this->phone_1 = $this->company->phone_1;
        $this->phone_2 = $this->company->phone_2;
        $this->register_number = $this->company->register_number;
        $this->company_url = $this->company->company_url;

    }

    public function save(): void
    {
        $this->company->update([
            'company_name' => $this->company_name,
            'industry_id' => $this->industry_id,
            'company_size' => $this->company_size,
            'company_type' => $this->company_type,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'register_number' => $this->register_number,
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
