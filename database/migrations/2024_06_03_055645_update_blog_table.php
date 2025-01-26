<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
             $table->string('meta_d',255)->after('title');
             $table->string('meta_key',255)->after('title');
        });
    }

   
    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            
        });
    }
};
