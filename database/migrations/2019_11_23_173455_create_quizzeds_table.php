<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedInteger('enterprise_id');
            $table->unsignedInteger('age_range_id');
            $table->unsignedInteger('studies_level_id');
            $table->string('name');
            $table->string('last_name');
            $table->longText('job');
            $table->longText('department');
            $table->longText('position_kind');
            $table->longText('civil_state');
            $table->longText('kind_contract');
            $table->longText('type_day');
            $table->longText('rotation_turn');
            $table->longText('current_position_time');
            $table->longText('enterprise_time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzeds');
    }
}
