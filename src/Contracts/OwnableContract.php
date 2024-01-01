<?php

namespace Kehet\LaravelOwnableModel\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface OwnableContract
{
    public function owner(): BelongsTo;

    public function isOwnedBy(OwnerContract $owner): bool;

    public function isNotOwnedBy(OwnerContract $owner): bool;

    public function scopeWhereOwnedBy(Builder $query, OwnerContract $owner): Builder;

    public function scopeWhereNotOwnedBy(Builder $query, OwnerContract $owner): Builder;
}
