<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private $defaultInsertModel = [

        'addition2' => [
            'title'         => "+",
            'priority'      => '1'
        ],
            
        'addition3' => [
            'title'         => "++",
            'priority'      => '10'
        ],
            
        'addition2skip' => [
            'title'         => "+?",
            'priority'      => '30'
        ],
        
        'addition3skip' => [
            'title'         => "+?+",
            'priority'      => '40'
        ],
        
        'subtraction2' => [
            'title'         => "-",
            'priority'      => '2'
        ],
        
        'subtraction3' => [
            'title'         => "--",
            'priority'      => '21'
        ],
    
        'subtraction2skip' => [
            'title'         => "-?",
            'priority'      => '31'
        ],
    
        'subtraction3skip' => [
            'title'         => "-?-",
            'priority'      => '41'
        ],
    
        'any2' => [
            'title'         => "+-",
            'priority'      => '3'
        ],
    
        'any3' => [
            'title'         => "+-",
            'priority'      => '23'
        ],
    
        'any2skip' => [
            'title'         => "+-?",
            'priority'      => '33'
        ],
    
        'any3skip' => [
            'title'         => "+?-",
            'priority'      => '43'
        ],
    
        'multiplication2' => [
            'title'         => "*",
            'priority'      => '4'
        ],
    
        'multiplication2skip' => [
            'title'         => "*?",
            'priority'      => '60'
        ],            

    ];


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests_templates', function (Blueprint $table) {
            $table->string('name', 64)->unique();
            $table->string('title', 128);
            $table->tinyInteger('priority')->default(1);
        });

        // Default insert
        foreach($this->defaultInsertModel as $quest_name => $value)

            DB::table('quests_templates')->insert(
                array(
                    'name'      => $quest_name,
                    'title'     => $value['title'],
                    'priority'  => $value['priority'],
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
        Schema::dropIfExists('quests_templates');
    }
};
