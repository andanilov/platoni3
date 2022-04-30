<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests_users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_quest_map');
            $table->tinyInteger('answers_num');
            $table->tinyInteger('mistakes_num');
            $table->integer('quest_period');
            $table->dateTime('created_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quest_users');
    }
};
