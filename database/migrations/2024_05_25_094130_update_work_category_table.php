<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('work_category', function (Blueprint $table) {         
            $table->integer('order')->after('category_name');       
        });
    }
  
    public function down(): void
    {
       
    }
};
