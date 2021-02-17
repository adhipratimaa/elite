<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('project_location')->nullable();
            $table->string('zip')->nullable();
            $table->text('services')->nullable();
            $table->string('other_services')->nullable();
            $table->text('project_type')->nullable();
            $table->enum('storey',['single-story', 'double-story', 'three-story', 'more_than_three_story' ])->nullable();
            $table->string('house_area')->nullable();
            $table->date('design_start_date')->nullable();
            $table->date('estimated_starting_date')->nullable();
            $table->string('budget')->nullable();
            $table->string('further_information')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
