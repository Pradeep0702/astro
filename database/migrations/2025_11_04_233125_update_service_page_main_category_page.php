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
        Schema::table('service_page', function (Blueprint $table) {
            $table->enum('main_category_page',['1','0'])->after('faq_section')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_page', function (Blueprint $table) {
            $table->dropColumn('main_category_page');
        });
    }
};
