<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class Acara19Controller extends Controller
{
    public function index() {
        $activeEmployees = Employee::active()->whereBetween('age',[18, 30])->get();

        $emp = Employee::first();
        if ($emp) {
            $emp->delete();
        }

        $allWithTrashed = Employee::withTrashed()->get();
        $onlyTrashed = Employee::onlyTrashed()->get();

        return response()->json([
            'message' => 'Praktikum Acara 19',
            'active_employees' => $activeEmployees,
            'only_trashed_data' => $onlyTrashed,
            'all_with_trashed' => $allWithTrashed,

        ]);

    }

    public function restoreData($id) {
        return "Data ID $id Berhasil di pulihkan  (restore)";
    }
}
