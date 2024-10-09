<?php

namespace App\Traits;

use App\Models\BaseApp\Company;
use App\Models\Team;
use App\Models\User;
use App\Scopes\TeamScope;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

trait BelongsToTeam
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */

    public static function bootBelongsToTeam(): void
    {
        static::addGlobalScope(new TeamScope);

        static::creating(function ($model) {
            $model->team_id = Auth::user()->currentTeam->id;
            $model->company_id = Auth::user()->company->id;
            $model->created_by = Auth::id();
        });

//        static::creating(function ($model) {
//            $user = Auth::user();
//            if ($user) {
//                $model->team_id = $user->currentTeam->id ?? null;
//                $model->company_id = $user->company->id ?? null;
//                $model->created_by = $user->id;
//            }
//        });
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
