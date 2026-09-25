<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT. Indofood Sukses Makmur Tbk',
                'phone' => '081234567890',
                'address' => 'Jl. Jend. Sudirman Plaza Indofood Tower, Jakarta Selatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'phone' => '082198765432',
                'address' => 'BSD Green Office Park, Jl. BSD Boulevard Barat, Tangerang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PT. Mayora Indah Tbk',
                'phone' => '085711223344',
                'address' => 'Jl. Tomang Raya No. 21-23, Jakarta Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); 
    }
}
