<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeRoleId(Builder $builder): Builder
    {
        return $builder->where('title', '=','user');
    }
}
