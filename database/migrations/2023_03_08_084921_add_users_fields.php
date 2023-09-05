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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('mobile');
            $table->string('referral_code');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('image')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
