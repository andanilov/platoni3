<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface MistakesTpl
{
    // public function getQuestMap ($id);
    // public function addQuestUser($data); // id_user, id_quest_map, answers_num,	mistakes_num
}


class Mistakes extends Model implements MistakesTpl
{
    use HasFactory;


    public function getMistakes ($idUser)
    {
        // return DB::table('quests_map')
        //     ->select('level', 'id_levels_template')
        //     ->get()
        //     ->groupBy('level')
        //     ->toJson();


        return DB::select("SELECT
                `user_mistakes`.`id`,
                `user_mistakes`.`task`,
                `user_mistakes`.`correct`,
                `quest_levels_templates`.`time`
                FROM `user_mistakes`, `quests_users`, `quests_map`, `quest_levels_templates`
                WHERE `user_mistakes`.`id_quests_users` = `quests_users`.`id`
                AND `quests_users`.`id_user` = :id
                AND `quests_users`.`id_quest_map` = `quests_map`.`id`
                AND `quests_map`.`id_levels_template` = `quest_levels_templates`.`id`
        ", ['id' => $idUser]);


        // return DB::select("SELECT
        //         `level`, COUNT(`id_levels_template`) AS `count`,
        //         (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
        //         (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
        //         FROM `quests_map`
        //         WHERE `id_levels_template`=`id_levels_template`
        //         GROUP BY `level`, `quest_name` ");

    }



    //

    // public function addQuestUser($data)
    // {

    //     if(!$data['id_user'])
    //         return false;


    //     // -- Try to add quest info

    //     if(!($questUserId = DB::table('quests_users')
    //         ->insertGetId([
    //             'id_user'       => $data['id_user'],
    //             'id_quest_map'  => $data['id_quest_map'],
    //             'answers_num'   => $data['answers_num'],
    //             'mistakes_num'  => $data['mistakes_num'],
    //             'quest_period'  => $data['quest_period'],
    //             'created_at'    => date('Y-m-d H:i:s'),
    //         ])
    //     ))
    //         return false;

    //     if($data['mistakes']) {

    //         // -- Prepare mistakes array to adding
    //         $mistakes = [];
    //         foreach($data['mistakes'] as $mistake)
    //             $mistakes[] = [
    //                 'id_quests_users'   => $questUserId,
    //                 'task'              => $mistake['task'],
    //                 'answer'            => ($mistake['answer'] === '_' || !$mistake['answer']) ? 0 : +$mistake['answer'],
    //                 'correct'           => $mistake['correct'],
    //                 'created_at'        => date('Y-m-d H:i:s')
    //             ];

    //         if (!DB::table('user_mistakes')->insert($mistakes))
    //             return false;
    //     }

    //     return $questUserId;

    // }


}
