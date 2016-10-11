<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAlltablesTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->integer('cate_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('kpt_khoapham', function(Blueprint $table){
            $table->increments('id');
            $table->string('monhoc');
            $table->integer('giatien');
            $table->string('giangvien');
            $table->timestamps();
        });
		
		Schema::create('images',function(Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->integer('product_id');
			$table->timestamps();
		});

        Schema::create('cars' , function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('car_color' , function(Blueprint $table){
            $table->increments('id');
            $table->integer('car_id');
            $table->integer('color_id');
            $table->timestamps();
        });

        Schema::create('colors' , function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
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
        
    }
}
