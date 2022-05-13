<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface QuestTpl
{
    public function getQuestMap ($id);
    public function addQuestUser($data); // id_user, id_quest_map, answers_num,	mistakes_num
}


class Quest extends Model implements QuestTpl
{
    use HasFactory;


    public function getQuestMap ($id)
    {
        // return DB::table('quests_map')
        //     ->select('level', 'id_levels_template')
        //     ->get()
        //     ->groupBy('level')
        //     ->toJson();


        return DB::select("SELECT
                `quests_map`.`id` AS `current_id`,
                `quest_levels_templates`.`quest_name`,
                `quest_levels_templates`.`min`,
                `quest_levels_templates`.`max`,
                `quest_levels_templates`.`time`,
                `quest_levels_templates`.`count`,
                `quest_levels_templates`.`negative_enable`,

                (SELECT MIN(`id`)
                    FROM `quests_map` AS `quests_map_1`
                    WHERE `quests_map_1`.`id` > `quests_map`.`id`
                    AND `quests_map_1`.`level` = `quests_map`.`level`)
                    AS `next_id`

                FROM `quests_map`, `quest_levels_templates`
                WHERE `quests_map`.`id` = :id
                    AND `quest_levels_templates`.`id` = `quests_map`.`id_levels_template`
        ", ['id' => $id]);


        // return DB::select("SELECT
        //         `level`, COUNT(`id_levels_template`) AS `count`,
        //         (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
        //         (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
        //         FROM `quests_map`
        //         WHERE `id_levels_template`=`id_levels_template`
        //         GROUP BY `level`, `quest_name` ");

    }



    //

    public function addQuestUser($data)
    {

        if(!$data['id_user'])
            return false;


        // -- Try to add quest info

        if(!($questUserId = DB::table('quests_users')
            ->insertGetId([
                'id_user'       => $data['id_user'],
                'id_quest_map'  => $data['id_quest_map'],
                'answers_num'   => $data['answers_num'],
                'mistakes_num'  => $data['mistakes_num'],
                'quest_period'  => $data['quest_period'],
                'created_at'    => date('Y-m-d H:i:s'),
            ])
        ))
            return false;

        if($data['mistakes']) {

            // -- Prepare mistakes array to adding
            $mistakes = [];
            foreach($data['mistakes'] as $mistake)
                $mistakes[] = [
                    'id_quests_users'   => $questUserId,
                    'task'              => $mistake['task'],
                    'answer'            => ($mistake['answer'] === '_' || !$mistake['answer']) ? 0 : +$mistake['answer'],
                    'correct'           => $mistake['correct'],
                    'created_at'        => date('Y-m-d H:i:s')
                ];

            if (!DB::table('user_mistakes')->insert($mistakes))
                return false;
        }

        return $questUserId;

    }


}
