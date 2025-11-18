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
            $table->longText('bottom_content')->after('main_category_page')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_page', function (Blueprint $table) {
            $table->dropColumn('bottom_content');
        });
    }
};
