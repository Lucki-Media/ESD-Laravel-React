<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partner', 255)->nullable();
            $table->longText('link')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('year', 255)->nullable();
            $table->longText('services')->nullable();
            $table->longText('projects')->nullable();
            $table->string('deleted_status', 11)->comment('0=deleted,1=not deleted')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};