<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

use Phaza\LaravelPostgis\Schema\Blueprint;

class CreateWorkplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplaces', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('postcode');            
            $table->point('location')->nullable();

            $table->string('workplace_type');
            $table->string('employer_id');

            $table->string('rms_id');
            $table->string('salesforce_id');

            $table->timestamps();

            $table->index('employer_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workplaces');
    }
}
