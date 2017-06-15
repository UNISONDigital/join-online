<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

use Phaza\LaravelPostgis\Schema\Blueprint;

class CreatePostcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('postcode');
            
            $table->integer('easting');
            $table->integer('northing');

            $table->point('location')->nullable();

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
        Schema::dropIfExists('postcodes');
    }
}
