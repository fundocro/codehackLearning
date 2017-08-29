<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->integer('category_id')->unsighned()->index();
            $table->integer('photo_id')->unsighned()->index();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //used to delete all posts if we delete user
            //make sure that id on user table and user_id on posts table are of same type!
            //index()->unsigned()->nullable() (CHECK DATABASE NOT MIGRATIONS!)
            
            //used to delete related users
       
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
