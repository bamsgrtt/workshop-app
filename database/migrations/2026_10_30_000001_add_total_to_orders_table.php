<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('orders', 'total')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('total')->default(0);
            });

            if (Schema::hasColumn('orders', 'total_amount')) {
                DB::table('orders')->update([
                    'total' => DB::raw('total_amount'),
                ]);
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('orders', 'total')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('total');
            });
        }
    }
};
