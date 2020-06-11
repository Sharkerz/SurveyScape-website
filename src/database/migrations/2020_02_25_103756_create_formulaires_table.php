<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaires', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->date('open_on', 0)->nullable();
            $table->date('close_on', 0)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->default('default.png');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('private');
            $table->string('background')->nullable();
            $table->longText('token');
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
        Schema::dropIfExists('formulaires');
    }
}
