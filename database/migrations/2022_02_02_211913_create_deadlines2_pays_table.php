<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlines2PaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadlines2_pays', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->decimal('standarRate', 10,4);
            $table->decimal('punctualRate', 10,4);
            $table->boolean('allow')->default(1);
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
        Schema::dropIfExists('deadlines2_pays');
    }
}
