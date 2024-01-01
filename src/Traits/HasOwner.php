<?php

namespace Kehet\LaravelOwnableModel\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kehet\LaravelOwnableModel\Contracts\OwnerContract;

/** @mixin Model */
trait HasOwner
{
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            $this->getOwnerModel(),
            $this->getOwnerForeignKey(),
            $this->getOwnerKey()
        );
    }

    public function isOwnedBy(OwnerContract $owner): bool
    {
        return $owner->getKey() === $this->owner->getKey();
    }

    public function isNotOwnedBy(OwnerContract $owner): bool
    {
        return ! $this->isOwnedBy($owner);
    }

    public function scopeWhereOwnedBy(Builder $query, OwnerContract $owner): Builder
    {
        return $query->where($this->getOwnerForeignKey(), $owner->getKey());
    }

    public function scopeWhereNotOwnedBy(Builder $query, OwnerContract $owner): Builder
    {
        return $query->where($this->getOwnerForeignKey(), '<>', $owner->getKey());
    }

    private function getOwnerModel()
    {
        return config('ownable-model.owner');
    }

    private function getOwnerForeignKey(): string
    {
        return 'owned_by_id';
    }

    private function getOwnerKey(): string
    {
        return 'id';
    }
}
