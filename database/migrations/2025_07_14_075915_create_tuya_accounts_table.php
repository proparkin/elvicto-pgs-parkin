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
        Schema::create('tuya_accounts', function (Blueprint $table) 
        {
            $table->id();
            $table->string('client_id');
            $table->string('secret');
            $table->string('api_url')->default('https://openapi.tuyaus.com');
            $table->string('name')->nullable(); // for your reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuya_accounts');
    }
};
