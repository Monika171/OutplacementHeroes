<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('location');
            $table->string('address');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('dob');
            $table->string('job_dept');
            $table->integer('experience');
            $table->string('company');
            $table->string('designation');
            $table->string('p_location');
            $table->string('salary');
            $table->string('bio');
            $table->string('cover_letter');
            $table->string('resume');
            $table->string('profile_pic');
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
        Schema::dropIfExists('profiles');
    }
}
