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
            $table->increments('id');
            $table->string('name', 32);
            $table->string('email', 32)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('followers', function (Blueprint $table) {
            $table->unsignedInteger('follower_id');
            $table->unsignedInteger('followed_id');

            $table->primary(['follower_id', 'followed_id']);

            $table->foreign('follower_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('followed_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('followers', function (Blueprint $table) {
//            $table->dropForeign('followers_follower_id_foreign');
//            $table->dropForeign('followers_followed_id_foreign');
//        });
        Schema::dropIfExists('followers');

        Schema::dropIfExists('users');
    }
}
