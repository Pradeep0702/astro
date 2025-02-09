<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_page', function (Blueprint $table) {
            $table->dropColumn('menu_icon');
        });
    }

    public function down(): void
    {
        Schema::table('service_page', function (Blueprint $table) {
            $table->string('menu_icon', 255)->nullable();
        });
    }
};
