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
        Schema::create('concern_headers', function (Blueprint $table) {
            $table->id();
            $table->string('sub_header')->default('OUR SISTER CONCERNS');
            $table->string('sec_header')->default('OUR SISTER CONCERNS');
            $table->string('sec_icon')->default('front-asset/assets/images/heading-icon.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concern_headers');
    }
};
