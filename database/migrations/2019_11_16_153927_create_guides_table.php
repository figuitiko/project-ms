<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->longText('description');
            $table->string('link')->nullable();
            $table->unsignedInteger('active_enterprise_id')->nullable();
            $table->integer('is_activated')->nullable();
            $table->longText('first_items');
            $table->longText('second_items');
            $table->unsignedInteger('guide_type_id');
            $table->integer('max_ammout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guides');
    }
}
