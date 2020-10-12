<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctersTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docters_turns', function (Blueprint $table) {
            $table->integer('docter_id')->unsigned();
            $table->integer('turn_id')->unsigned();
            $table->foreign('docter_id')->references('id')->on('docters')->onDelete('cascade');
            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');
            $table->unique(['docter_id','turn_id']);
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
        Schema::dropIfExists('docters_turns');
    }
}
