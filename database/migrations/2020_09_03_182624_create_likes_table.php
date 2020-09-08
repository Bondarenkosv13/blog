<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('message_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();

            $table->foreign('message_id')
                ->references('id')
                ->on('messages')
                ->cascadeOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            if (Schema::hasColumn('likes', 'post_id')) {
                $table->dropForeign(['post_id']);
            }
            if (Schema::hasColumn('likes', 'message_id')) {
                $table->dropForeign(['message_id']);
            }
        });
        Schema::dropIfExists('likes');
    }
}
