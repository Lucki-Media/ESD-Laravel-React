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
        Schema::table('pivot_images', function (Blueprint $table) {
            $table->string('type', 11)->comment('2=image,1=video')->nullable();
            $table->longText('video_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pivot_images', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('video_link');
        });
    }
};
