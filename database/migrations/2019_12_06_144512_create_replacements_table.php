<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('it_user_id');
            $table->string('damaged');
            $table->string('sn')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->boolean('did_issue');
            $table->text('description_user')->nullable();
            $table->integer('manager');
            $table->integer('status');
            $table->text('description_it')->nullable();
            $table->integer('cost');
            $table->date('date_of_req');
            $table->boolean('reason');
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
        Schema::dropIfExists('replacements');
    }
}
