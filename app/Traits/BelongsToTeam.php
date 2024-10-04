<?php

namespace App\Traits;

use App\Models\BaseApp\Company;
use App\Models\Team;
use App\Models\User;
use App\Scopes\TeamScope;
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

        static ::creating(function ($model) {
            if(session()->has('current_team_id')){
                $model->current_team_id = session()->get('current_team_id');
            }
        });
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
