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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title')->default('Create the Building You Want Here');
            $table->string('slider_desc')->default('Busico is a construction and architecture environmentally most responsible for any kinds of themes.');
            $table->string('btn_title')->default('Start Consulting');
            $table->string('btn_link')->default('#');
            $table->string('model_id')->default('exampleModal1');
            $table->string('slider_img')->default('front-asset/assets/images/slider-default.jpg');
            $table->boolean('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
