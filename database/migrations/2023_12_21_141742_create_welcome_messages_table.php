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
        Schema::create('welcome_messages', function (Blueprint $table) {
            $table->id();
            $table->char('welcome_sub_title', 255)->default('WELCOME TO OUR COMPANY');
            $table->char('welcome_title', 255)->default('Constro Provides a full range of services');
            $table->text('welcome_message')->default('We successfully cope with tasks of varying complexity, provide long-term guarantees and regularly master new technologies. Our portfolio includes dozens of successfully completed projects of houses of different storeys, with high–quality finishes and good repairs. Building houses is our vocation!');
            $table->string('sign')->default('front-asset/assets/images/signature.png');
            $table->string('user_name', 100)->default('Mohiuddin Bhuiyan');
            $table->string('user_designation', 100)->default('Director of Constro Company');
            $table->string('welcome_image_one')->default('https://via.placeholder.com/370x500');
            $table->string('welcome_image_two')->default('https://via.placeholder.com/265x325');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_messages');
    }
};
