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
        Schema::create('quests_map', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('level');
            $table->integer('id_levels_template');
        });

        $defaultInsert = [

            1 => [1, 1, 2],
            2 => [2, 2, 3,                  37, 37, 38],
            3 => [2, 3, 3, 3,               37, 38, 38, 39],
            4 => [3, 3, 4, 4,               38, 39, 39, 39,             10, 10, 11, 11],
            5 => [4, 4, 4, 5, 6,            39, 39, 40, 40, 41,         11, 11, 12, 12,             19, 19, 20],
            6 => [5, 5, 6, 6, 6,            40, 41, 41, 41, 42,         12, 12, 13, 13, 13,         20, 20, 21, 22,         73, 73],
        ];

        foreach($defaultInsert as $level => $value)

            foreach($value as $idLevels)

                DB::table('quests_map')->insert(
                    array(
                        'level'=>$level,
                        'id_levels_template' => $idLevels,
                    )
                );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quest_maps');
    }
};
