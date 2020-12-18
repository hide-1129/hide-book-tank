<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration
{
    
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
            $table->timestamps();
            
            // 外部キー設定
            // $table->foreign(このテーブルのカラム名)->references(リレーション先のカラム名)->on(リレーション先のテーブル名)->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            
            // user_idとmicropost_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'post_id']);
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('favorite');
    }
}
