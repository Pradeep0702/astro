<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('admin_login', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email',255);
            $table->string('otp',255)->default("");
            $table->enum('status',['active','deactive'])->default("active");
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('admin_login');
    }
};
