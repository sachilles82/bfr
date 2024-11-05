<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    use AuthorizesRequests;

    public function show()
    {
//        $this->authorize('show', $company);
        $company = Auth::user()->company;

        if (!$company) {
            abort(404, 'Company not found');
        }

        return view('laravel.hr.company.show',
            compact('company')
        );
    }

}
