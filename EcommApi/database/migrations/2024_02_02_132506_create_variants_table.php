<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('name');
            $table->string('sku');
            $table->decimal('additional_cost', 8, 2);
            $table->integer('stock_count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
