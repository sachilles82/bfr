<?php

namespace App\Models\BaseApp;

use App\Traits\BelongsToTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes, HasFactory, BelongsToTeam;

    protected $fillable = [
        'name',
        'current_team_id',
    ];
}
