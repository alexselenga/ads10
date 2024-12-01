<?php

namespace App\Models\_;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static whereJsonContainsKeyValues(string $fieldName, array $keyValues)
 */
trait Scopes
{
    public function scopeWhereJsonContainsKeyValues(Builder $query, string $fieldName, array $search, string $boolean = 'or'): void
    {
        foreach ($search as $item) {
            $key = "$fieldName->".$item['key'];
            $value = $item['value'];
            $value = (float)$value != $value ? $value : (float)$value;

            $query->whereJsonContains($key, $value, $boolean);
        }
    }
}
