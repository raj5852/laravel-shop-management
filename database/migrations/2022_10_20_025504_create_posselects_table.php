<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosselectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posselects', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('productid');
            $table->string('name');
            $table->string('qnt');
            $table->string('price');
            $table->string('subt');
            $table->string('issell')->default(0);
            $table->string('saleid')->nullable();
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
        Schema::dropIfExists('posselects');
    }
}
