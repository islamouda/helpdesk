<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('priority_id');
            // $table->integer('type_id');
            $table->integer('status_id')->default(0);
            $table->integer('user_id');
            $table->integer('recipient_id')->nullable();
            $table->string('title');
            $table->text('subject')->nullable();
            $table->text('replay')->nullable();
            $table->timestamp('ticket_time')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
