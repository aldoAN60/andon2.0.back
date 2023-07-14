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
        Schema::create('production_lines_status', function (Blueprint $table) {
            $table->id();
            $table->integer('line_number');
            $table->string('reason');
            $table->dateTime('runing_at')->nullable();
            $table->dateTime('stopped_at')->nullable();
            $table->string('current_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_lines_status');
    }
};
