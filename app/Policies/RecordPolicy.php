<?php

namespace App\Policies;

use App\Models\Record;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RecordPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Record $record): bool
    {
        return $record->access === 1;
    }
}
