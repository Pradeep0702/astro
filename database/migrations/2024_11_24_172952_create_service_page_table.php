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
        Schema::create('service_page', function (Blueprint $table) {
            $table->id();
            $table->string('cat_id',255);
            $table->string('menu_name',255);
            $table->string('menu_icon',255);
            $table->string('menu_slug',255);
            $table->longText('meta_data');
            $table->longText('hero_section');
            $table->longText('info_card_section');
            $table->longText('page_banner_section');
            $table->longText('main_section');
            $table->longText('faq_section'); 
            $table->enum('status',['active','deactive'])->default('active'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_page');
    }
};
