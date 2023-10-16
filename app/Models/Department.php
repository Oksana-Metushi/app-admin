<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    public function employees(): HasMany
    {
        return $this->hasMany(User::class)->where('is_role', 0);
    }

    public function scopeFilter(Builder $builder, ?string $filter): Builder
    {
        if ($filter) {
            $builder->where('name', 'like', '%'.$filter.'%');
        }

        return $builder;
    }
}
