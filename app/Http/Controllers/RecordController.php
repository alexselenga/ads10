<?php

namespace App\Http\Controllers;

use App\Models\Record;

class RecordController extends Controller
{

    public function index()
    {
        $search = request()->input('search', []);
        return Record::whereJsonContainsKeyValues('data', $search)->get()->toArray();
    }
}
