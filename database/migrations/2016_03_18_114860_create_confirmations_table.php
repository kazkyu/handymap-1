<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rateValue');
            $table->string('description');
            $table->integer('idrefUser')->unsigned();
            $table->integer('idrefPoint')->unsigned();
            $table->foreign('idrefUser')
                ->references('id')
                ->on('users');
            $table->foreign('idrefPoint')
                ->references('id')
                ->on('points')
                ->onDelete('cascade');
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

    }
}
