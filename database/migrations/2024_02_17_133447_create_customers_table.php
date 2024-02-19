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
        Schema::create('customers', function (Blueprint $table) {
            $table->id("cu_id");
            $table->string("cu_firstname")->nullable();
            $table->string("cu_lastname")->nullable();
            $table->string("cu_street")->nullable();
            $table->string("cu_zip")->nullable();
            $table->string("cu_city")->nullable();
            $table->string("cu_country")->nullable();
            $table->string("cu_phonenumber")->nullable();
            $table->string("cu_email");
            $table->boolean("cu_is_reseller")->default("0");
            $table->boolean("cu_is_maintainer")->default("0");
            $table->string("cu_uid")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
