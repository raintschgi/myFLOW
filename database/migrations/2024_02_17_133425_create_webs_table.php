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
        Schema::create('webs', function (Blueprint $table) {
            $table->string("we_user")->primary();
            $table->string("we_server");
            $table->string("we_internal_hostaddress");
            $table->string("we_maintained_by");
            $table->double("we_quota");
            $table->string("we_php_vers");
            $table->boolean("we_is_online")->default("0");
            $table->date("we_online_since")->nullable();
            $table->string("we_comment")->nullable();
            $table->timestamps();

            // FK von "packages"
            $table->unsignedBigInteger("pa_id");
            $table->foreign("pa_id")->references("pa_id")->on("packages")->onDelete("restrict")->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webs');
    }
};
