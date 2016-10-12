<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('street_address');
            $table->string('locality_id');
            $table->unsignedInteger('district_id');
            $table->string('postcode');
            $table->string('telephone');
            $table->string('slug');
            $table->unsignedInteger('category_id');
            $table->string('keywords');
            $table->string('image');
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
        Schema::drop('business');
    }
}
