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
        Schema::table('cities', function (Blueprint $table) {
            $table->string('name', 125)->nullable();
            $table->string('slug', 190)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->string('name', 125)->nullable();
            $table->string('slug', 190)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);
        });
    }
};
