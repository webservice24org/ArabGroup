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
        Schema::create('address_cards', function (Blueprint $table) {
            $table->id();
            $table->string('widget_title')->default('Get in Touch');
            $table->string('office_phone')->default('+880-1911555084');
            $table->string('email')->default('microwebtechnology@gmail.com');
            $table->string('address')->default('46/6, Haque Tower, Block M, Baganbari-Main Road, Banashri, Rampura, Dhaka-1219');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_cards');
    }
};
