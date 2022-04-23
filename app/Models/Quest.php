<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface QuestTpl
{
    public function getQuestMap ($id);
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
                (SELECT MIN(`id`) FROM `quests_map` WHERE `quests_map`.`id` > `current_id`) AS `next_id`
                FROM `quests_map`, `quest_levels_templates`
                WHERE `quests_map`.`id` = :id
                    AND `quest_levels_templates`.`id` = `quests_map`.`id_levels_template`
                    AND `quest_levels_templates`.`level` = `quests_map`.`level`

        ", ['id' => $id]);


        // return DB::select("SELECT
        //         `level`, COUNT(`id_levels_template`) AS `count`,
        //         (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
        //         (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
        //         FROM `quests_map`
        //         WHERE `id_levels_template`=`id_levels_template`
        //         GROUP BY `level`, `quest_name` ");

    }


}
