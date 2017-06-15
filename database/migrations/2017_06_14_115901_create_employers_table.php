<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('postcode');  

            $table->string('service_group');

            $table->string('rms_id')->unique();
            $table->string('salesforce_id');

            $table->timestamps();

            $table->index('rms_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
