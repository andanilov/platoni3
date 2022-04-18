<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private $defaultInsertModel = [

        'addition2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
            ],
            
        'addition3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
            ],
            
        'addition2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
            ],
        
        'addition3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
            ],
        
        'subtraction2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
            ],
        
        'subtraction3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'subtraction2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'subtraction3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'any2' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'any3' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'any2skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'any3skip' => [
                1 => [ 'min' => 2, 'max' => 10, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 3, 'max' => 20, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 4, 'max' => 30, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 5, 'max' => 40, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 9, 'max' => 50, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 11, 'max' => 60, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 11, 'max' => 70, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 11, 'max' => 80, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 11, 'max' => 99, 'time' => 25, 'count' => 70]
        ],
    
        'multiplication2' => [
                1 => [ 'min' => 2, 'max' => 3, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 2, 'max' => 4, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 2, 'max' => 5, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 2, 'max' => 6, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 2, 'max' => 7, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 2, 'max' => 8, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 2, 'max' => 9, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 2, 'max' => 10, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 2, 'max' => 11, 'time' => 25, 'count' => 70]
        ],
    
        'multiplication2skip' => [
                1 => [ 'min' => 2, 'max' => 3, 'time' => 60, 'count' => 7],
                2 => [ 'min' => 2, 'max' => 4, 'time' => 55, 'count' => 10],
                3 => [ 'min' => 2, 'max' => 5, 'time' => 50, 'count' => 15],
                4 => [ 'min' => 2, 'max' => 6, 'time' => 45, 'count' => 22],
                5 => [ 'min' => 2, 'max' => 7, 'time' => 40, 'count' => 30],
                6 => [ 'min' => 2, 'max' => 8, 'time' => 35, 'count' => 40],
                7 => [ 'min' => 2, 'max' => 9, 'time' => 30, 'count' => 50],
                8 => [ 'min' => 2, 'max' => 10, 'time' => 30, 'count' => 60],
                9 => [ 'min' => 2, 'max' => 11, 'time' => 25, 'count' => 70]
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
