<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('provider_id');

            $table->string('name');
            $table->string('email')->nullable();;
            $table->string('username')->nullable();;
            $table->string('avatar')->nullable();;
            $table->string('location')->nullable();;
            $table->text('description')->nullable();;

            $table->string('provider_token');
            $table->string('provider_token_secret')->nullable();;

            $table->rememberToken();
            $table->timestamps();

            $table->index(['provider', 'provider_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
