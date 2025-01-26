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
        Schema::create('bussiness_contact', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',255);
            $table->string('number_of_location',255);
            $table->string('full_name',255);
            $table->string('mobile_number',12);
            $table->string('bussiness_email',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussiness_contact');
    }
};
