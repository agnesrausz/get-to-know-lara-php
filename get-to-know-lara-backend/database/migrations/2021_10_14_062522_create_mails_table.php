<?php

use App\Models\User;
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
            $table->foreignIdFor(User::class, 'id_user_to')
                ->nullable()
                ->constrained('users');
            $table->foreignIdFor(User::class, 'id_user_from')
                ->nullable()
                ->constrained('users');
            $table->string('subject');
            $table->text('message')->nullable();
            $table->boolean('is_read');
            $table->timestamp('sent')->nullable();
            $table->timestamp('created')->useCurrent();
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
