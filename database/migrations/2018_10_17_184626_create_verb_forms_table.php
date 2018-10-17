<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verb_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('verb_type');
            $table->string('v1');
            $table->string('v2');
            $table->string('v3');
            $table->string('v4');
            $table->text('meaning');
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
        Schema::dropIfExists('verb_forms');
    }
}
