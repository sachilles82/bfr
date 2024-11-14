<?php

namespace App\Models\HR;

use App\Enums\Company\CompanySize;
use App\Enums\Company\CompanyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'owner_id',
            'created_by',
            'industry_id',
            'company_url',
            'company_size',
            'company_type',
            'register_number',
            'email',
            'phone_1',
            'phone_2',
            'form_type',
            'is_active',
        ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'company_type' => CompanyType::class,
        'company_size' => CompanySize::class,
        'is_active' => 'boolean',

    ];
}
