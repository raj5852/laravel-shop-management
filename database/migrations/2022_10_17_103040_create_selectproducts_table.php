<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectproducts', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('productid');
            $table->string('name');
            $table->string('rate');
            $table->string('qty');
            $table->string('total');
            $table->string('purchaseId')->default(0);
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
        Schema::dropIfExists('selectproducts');
    }
}
