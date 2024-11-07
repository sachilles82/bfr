<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class State extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'country_id',
        'user_id',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($state) {
            if (Auth::check()) {
                $state->user_id = Auth::id();
            }
        });

        static::created(function () {
            Cache::forget('states');
        });

        static::updated(function () {
            Cache::forget('states');
        });

        static::deleted(function () {
            Cache::forget('states');
        });
    }
}
