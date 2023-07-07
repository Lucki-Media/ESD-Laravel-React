<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('communicate', function (Blueprint $table) {
            $table->string('read_status', 11)->comment('0=seen,1=unseen')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('communicate', function (Blueprint $table) {
            $table->dropColumn('read_status');
        });
    }
};
