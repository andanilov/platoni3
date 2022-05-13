<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private $defaultInsertModel = [

        'addition2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
            ],

        'addition3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
            ],

        'addition2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
            ],

        'addition3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
            ],

        'subtraction2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
            ],

        'subtraction3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'subtraction2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'subtraction3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'any2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'any3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'any2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'any3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'multiplication2' => [
                1 => [ 'min' => 2, 'max' => 3, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 2, 'max' => 4, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 2, 'max' => 5, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 2, 'max' => 6, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 2, 'max' => 7, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 2, 'max' => 8, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 2, 'max' => 9, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 2, 'max' => 10, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 2, 'max' => 11, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

        'multiplication2skip' => [
                1 => [ 'min' => 2, 'max' => 3, 'time' => 60, 'count' => 7, 'negative_enable' => '0'],
                2 => [ 'min' => 2, 'max' => 4, 'time' => 55, 'count' => 10, 'negative_enable' => '0'],
                3 => [ 'min' => 2, 'max' => 5, 'time' => 50, 'count' => 15, 'negative_enable' => '0'],
                4 => [ 'min' => 2, 'max' => 6, 'time' => 45, 'count' => 22, 'negative_enable' => '0'],
                5 => [ 'min' => 2, 'max' => 7, 'time' => 40, 'count' => 30, 'negative_enable' => '0'],
                6 => [ 'min' => 2, 'max' => 8, 'time' => 35, 'count' => 40, 'negative_enable' => '0'],
                7 => [ 'min' => 2, 'max' => 9, 'time' => 30, 'count' => 50, 'negative_enable' => '0'],
                8 => [ 'min' => 2, 'max' => 10, 'time' => 30, 'count' => 60, 'negative_enable' => '0'],
                9 => [ 'min' => 2, 'max' => 11, 'time' => 25, 'count' => 70, 'negative_enable' => '0']
        ],

    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quest_levels_templates', function (Blueprint $table) {
            $table->id();
            $table->string('quest_name', 64);
            $table->tinyInteger('level');
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->integer('time');
            $table->integer('count');
            $table->boolval('negative_enable', false);
        });

         // Default insert
         foreach($this->defaultInsertModel as $quest_name => $value)

            foreach($value as $level => $val)

                DB::table('quest_levels_templates')->insert(
                    array(
                        'quest_name'=> $quest_name,
                        'level'     => $level,
                        'min'       => $val['min'],
                        'max'       => $val['max'],
                        'time'      => $val['time'],
                        'count'     => $val['count']
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
        Schema::dropIfExists('quest_levels_templates');
    }
};
