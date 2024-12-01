<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Support\Facades\Gate;

class RecordController extends Controller
{
    public function index()
    {
        $search = request()->input('search', []);

        return Record::whereJsonContainsKeyValues('data', $search)
            ->where('access', 1)
            ->get();
    }

    public function show(Record $record)
    {
        Gate::authorize('view', $record);
        return $record;
    }
    public function show2(Record $record)
    {
        return $record;
    }
}
