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
        Schema::create('sister_concerns', function (Blueprint $table) {
            $table->id();
            $table->string('company_title', 150)->default('Arab Builders');
            $table->string('company_desc', 250)->default('Lorem ipsum dolor sit amet, consectne auctor aliquet. Aenean sollicitudi, lorem bibendum auctor');
            $table->string('company_icon_one')->default('front-asset/assets/images/icon.png');
            $table->string('company_icon_two')->default('front-asset/assets/images/icon.png');
            $table->string('company_link')->default('#');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sister_concerns');
    }
};
