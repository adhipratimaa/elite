<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cell')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('career_banner_image')->nullable();
            $table->string('program_banner_image')->nullable();
            $table->string('contact_banner_image')->nullable();
            $table->string('services_banner_image')->nullable();
            $table->string('quote_banner_image')->nullable();
            $table->string('home_text')->nullable();
            $table->integer('complete_project')->nullable();
            $table->integer('work')->nullable();
            $table->integer('experience')->nullable();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('image')->nullable();
            $table->text('office_map')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
