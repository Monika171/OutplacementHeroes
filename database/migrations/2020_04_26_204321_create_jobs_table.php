<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('company_id');
            $table->string('title');
            $table->string('slug');
            $table->mediumText('description')->nullable();
            $table->string('position')->nullable();
            $table->string('salary')->nullable();
            $table->text('roles')->nullable();
            $table->string('function')->nullable();
            $table->integer('category_id');   
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('type')->nullable();
            $table->string('notice_period')->nullable();
            $table->integer('status')->nullable();
            $table->string('last_date')->nullable();
            $table->integer('number_of_vacancy')->nullable();
            $table->string('course')->nullable();
            $table->string('specialization')->nullable();
            $table->integer('experience')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('preferences')->nullable();
           
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
        Schema::dropIfExists('jobs');
    }
}
