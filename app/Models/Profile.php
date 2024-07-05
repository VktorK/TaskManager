<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProfileId(Builder $builder): Builder
    {
        return $builder->where('user_id', auth()->id());
    }
}
