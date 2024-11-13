<?php

namespace App\Enums\Company;

enum CompanyType: string
{
    case AG = 'ag';
    case GmbH = 'gmbh';
    case Einzelfirma = 'einzelfirma';

    public function label(): string
    {
        return match ($this) {
            static::AG => __('AG'),
            static::GmbH => __('GmbH'),
            static::Einzelfirma => __('Einzelfirma'),
        };
    }
}
