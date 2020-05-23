<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id')->index();
            $table->string('magic_source_id')->nullable()->index();

            $table->string('title')->nullable()->index();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();

            $table->text('link');
            $table->text('image')->nullable();

            $table->integer('clicks')->default(0);
            $table->boolean('is_active')->default(true)->index();

            $table->string('hash')->index();
            $table->dateTime('magic_source_created')->nullable();
            $table->timestamps();

            $table->index('created_at');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
