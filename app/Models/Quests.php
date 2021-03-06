<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Quests extends Model
{
    use HasFactory;


    public function getQuestsMap ($id_user = false)
    {
        return DB::select("SELECT
                `level`,
                MIN(`id`) as `firstId`,
                MAX(`id`) AS `lastId`,
                COUNT(`id_levels_template`) AS `count`,
                (SELECT `quest_name`
                    FROM `quest_levels_templates`
                    WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`)
                    AS `quest_name`,
                (SELECT `title`
                    FROM `quests_templates`
                    WHERE `quests_templates`.`name`=`quest_name`)
                    AS `title`
                FROM `quests_map`
                WHERE `id_levels_template` = `id_levels_template`
                GROUP BY `level`, `quest_name` ");
    }


    public function getUserQuestsProgress ($id_user)
    {
        return $id_user
            ? DB::select("SELECT
                `quests_map`.`level`,
                MAX(`quests_users`.`id_quest_map`) as `currentId`,
                (SELECT MIN(`quests_map_2`.`id`)
                    FROM `quests_map` AS `quests_map_2`
                    WHERE `quests_map_2`.`level` = `quests_map`.`level`
                    AND `quests_map_2`.`id` > MAX(`quests_users`.`id_quest_map`))
                    AS `nextId`,

                (SELECT COUNT(`quests_map_3`.`id_levels_template`)
                    FROM `quests_map` AS `quests_map_3`, `quest_levels_templates` AS `quest_levels_templates_3`
                    WHERE `quests_map_3`.`id` <= MAX(`quests_users`.`id_quest_map`)
                    AND `quests_map_3`.`level` = `quests_map`.`level`
                    AND `quests_map_3`.`id_levels_template` = `quest_levels_templates_3`.`id`
                    AND `quest_levels_templates_3`.`quest_name` =`quest_levels_templates`.`quest_name`
                    )
                    AS `passedNum`,
                `quest_levels_templates`.`quest_name`
                FROM `quests_map`, `quests_users`, `quest_levels_templates`
                WHERE `quests_users`.`id_quest_map` > 0
                    AND `quests_users`.`id_quest_map` = `quests_map`.`id`
                    AND `quests_users`.`id_user` = :id_user
                    AND `quests_users`.`mistakes_num` < 3
                    AND `quest_levels_templates`.`id` = `quests_map`.`id_levels_template`
                GROUP BY `level`, `quest_name`
                ORDER BY `quests_map`.`level`"
                , ['id_user' => $id_user])
            : [];
    }


    public function getQuestLevelsInfoByMapId ($idMap)
    {
        return DB::select("SELECT
                        `quest_levels_templates`.`id`,
                        `quest_levels_templates`.`level`,
                        `quest_levels_templates`.`min`,
                        `quest_levels_templates`.`max`,
                        `quest_levels_templates`.`time`,
                        `quest_levels_templates`.`count`
                        FROM `quest_levels_templates`, `quests_map`
                        WHERE `quests_map`.`id` = :id
                        AND `quests_map`.`id_levels_template` = `quest_levels_templates`.`id`
                        ", ['id' => $idMap]);
    }

}
