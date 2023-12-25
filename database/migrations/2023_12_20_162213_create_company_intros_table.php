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
        Schema::create('company_intros', function (Blueprint $table) {
            $table->id();
            $table->string('widget_title')->default('About Us');
            $table->string('about_title')->default('We Build Building and Great Homes');
            $table->text('about_desc')->default('We successfully cope with tasks of varying complexity, provide long-term guarantees and regularly master new technologies.');
            $table->text('about_img')->default('front-asset/assets/images/about-default.jpg');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_intros');
    }
};
