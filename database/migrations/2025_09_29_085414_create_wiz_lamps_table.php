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
        Schema::create('wiz_lamps', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('mac_addresss')->unique();
            $table->string('ip_addresss')->unique(); 
            $table->boolean('status')->default(false);
          
            $table->timestamp('last_seen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiz_lamps');
    }
};
