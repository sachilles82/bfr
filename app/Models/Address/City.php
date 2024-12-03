<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class City extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'state_id',
        'user_id',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($state) {
            if (Auth::check()) {
                $state->user_id = Auth::id();
            }
        });

        static::created(function () {
            Cache::forget('cities');
        });

        static::updated(function () {
            Cache::forget('cities');
        });

        static::deleted(function () {
            Cache::forget('cities');
        });
    }

}
