<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user_to')
                ->nullable()
                ->constrained();
            $table->foreignId('id_user_from')
                ->nullable()
                ->constrained();
            $table->string('subject');
            $table->string('message');
            $table->boolean('is_read');
            $table->timestamps('sent');
            $table->timestamps('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
