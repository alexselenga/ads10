<?php

namespace App\Models\_;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static whereJsonContainsKeyValues(string $fieldName, array $keyValues)
 */
trait Scopes
{
    public function scopeWhereJsonContainsKeyValues(Builder $query, string $fieldName, array $keyValues, string $boolean = 'or'): void
    {
        foreach ($keyValues as $key => $value) {
            $query->whereJsonContains("$fieldName->$key" , $value, $boolean);
        }
    }
}
