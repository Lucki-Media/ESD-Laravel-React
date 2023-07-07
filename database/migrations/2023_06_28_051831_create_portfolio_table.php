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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->longText('content')->nullable();
            $table->longText('services')->nullable();
            $table->longText('partners')->nullable();
            $table->string('year', 15)->nullable();
            $table->string('priority', 15)->nullable();
            $table->string('show_details', 15)->nullable();
            $table->string('deleted_status', 11)->comment('0=deleted,1=not deleted')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};