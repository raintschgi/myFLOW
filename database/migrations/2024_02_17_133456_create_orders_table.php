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
        Schema::create('orders', function (Blueprint $table) {
            $table->id("or_id");
            $table->string("or_type");
            $table->string("or_discount")->default("");
            $table->boolean("or_is_in_settlement")->default("0");
            $table->date("or_cancelled_since")->nullable();
            $table->string("or_replacement")->nullable();
            $table->double("or_price")->nullable();
            $table->date("or_creation_date")->nullable();
            $table->date("or_billing_date")->nullable();
            $table->string("or_comment")->nullable();
            $table->timestamps();

            // FK von "customers"           
            $table->unsignedBigInteger("cu_id");
            $table->foreign("cu_id")->references("cu_id")->on("customers")->onDelete("restrict")->onUpdate("restrict");
            //$table->foreignId("customer_id")->constrained("customers"); <- ALTERNATIVE SCHREIBWEISE!

            // FK von "others"
            $table->unsignedBigInteger("ot_id");
            $table->foreign("ot_id")->references("ot_id")->on("others")->onDelete("restrict")->onUpdate("restrict");

            // FK von "webs"
            $table->string("we_user");
            $table->foreign("we_user")->references("we_user")->on("webs")->onDelete("restrict")->onUpdate("restrict");

            // FK von "domains"
            $table->string("do_name");
            $table->foreign("do_name")->references("do_name")->on("domains")->onDelete("restrict")->onUpdate("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
