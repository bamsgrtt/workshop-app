<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Acara17Controller extends Controller
{   
    public function index() {
        $data = [
            'name'=> 'Jane Doe',
            'email'=> 'janedoe@example.com',
            'password'=> bcrypt('password123'),
            'status' => 'active',
            'role' => 'admin',
            'age' => 20,
            'points' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('employees')->updateOrInsert(['email' => $data['email']], $data);
        $id = DB::table('employees')->where('email', $data['email'])->value('id');

        // 2. Ambil data dengan kondisi
        $allEmployees = DB::table('employees')->get();
        $singleEmployees = DB::table('employees')->where('email', 'janedoe@example.com')->first();
        $adults = DB::table('employees')->where('age', '>', 18)->get();

        // 3. update data & increment
        DB::table('employees')->where('id', $id)->update(['status' => 'active']);
        DB::table('employees')->where('id', $id)->increment('points', 5);

        // 4. fungsi agregat
        $total = DB::table('employees')->count();
        $avgAge = DB::table('employees')->avg('age');

        // 5. pluck mengambil daftar nama
        $names = DB::table('employees')->pluck('name');

        return response()->json([
            'message' => 'Praktikum Acara 17 Berhasil!',
            'inserted_id' => $id,
            'total_data' => $total,
            'avg_age' => $avgAge,
            'employee_names' => $names,
            'all_employees' => $allEmployees,
            'adults' => $adults,
            'data_single' => $singleEmployees
        ]);

    }

    public function deleteData($id) {
        DB::table('employees')->where('id', $id)->delete();
        return "Data berhasil di hapus";
    }
}
