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
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('module', 50)->nullable();
            $table->string('title', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('deleted_status', 11)->comment('0=deleted,1=not deleted')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};