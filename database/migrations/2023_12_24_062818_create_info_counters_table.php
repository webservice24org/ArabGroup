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
        Schema::create('info_counters', function (Blueprint $table) {
            $table->id();
            $table->integer('counter')->default(30);
            $table->string('counter_sub_title', 20)->default('Years');
            $table->string('counter_title', 60)->default('Employees in team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_counters');
    }
};
