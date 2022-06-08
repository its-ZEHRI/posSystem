<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('p_code',20)->nullable();
            $table->integer('p_price');
            $table->integer('ws_price');
            $table->integer('s_price');
            $table->integer('quantity');
            $table->string('category_id')->constrained();
            $table->string('supplier_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('purchase_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
