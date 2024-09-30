<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class TeamScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('current_team_id', session()->get('current_team_id'));
    }

}
