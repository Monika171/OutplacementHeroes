<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->char('iso3', 3);
            $table->char('iso2', 2);
            $table->string('phonecode', 255);
            $table->string('capital', 255);
            $table->string('currency', 255);
            $table->string('native', 255);
            $table->string('emoji', 191);
            $table->string('emojiU', 191);
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
