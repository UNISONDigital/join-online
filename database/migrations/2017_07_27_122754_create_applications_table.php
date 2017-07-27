<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

use Phaza\LaravelPostgis\Schema\Blueprint;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('token');
                        
            // step 1
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('national_insurance')->nullable();

            // step 2
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('town')->nullable();
            $table->string('postcode')->nullable();    
            $table->string('work_email')->nullable();

            // step 3
            $table->string('employer')->nullable();
            $table->string('workplace')->nullable();
            $table->string('salary')->nullable();
            $table->string('salary_frequency')->nullable();

            // step 4
            $table->string('payment_method')->nullable();
            $table->string('direct_debit_account_name')->nullable();
            $table->string('direct_debit_account_number')->nullable();
            $table->string('direct_debit_sort_code')->nullable();
            $table->string('direct_debit_day_of_month')->nullable();

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
        Schema::dropIfExists('applications');
    }
}
