<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class Acara18Controller extends Controller
{
    public function index()
    {
        // 1. Create Data via Eloquent
        $employee1 = Employee::create([
            'name' => 'John Doe',
            'email' => 'john' . rand(1, 999) . '@example.com',
            'password' => bcrypt('password'),
            'age' => 25
        ]);

        // 2. Read Data
        $all = Employee::all();
        $find = Employee::find($employee1->id);
        $mustFind = Employee::where('email', $employee1->email)->firstOrFail();

        // 3. Update Data
        $employee1->name = 'John Doe Updated';
        $employee1->save();

        return response()->json([
            'message' => 'Praktikum Acara 18',
            'data_created' => $employee1,
            'total_data' => $all->count()
        ]);
    }

    public function destroy($id)
    {
        // 4. Delete Data
        Employee::destroy($id);
        return "Employee ID $id berhasil dihapus via Eloquent!";
    }
}