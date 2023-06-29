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
        Schema::create('communicate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('project', 255)->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communicate');
    }
};
