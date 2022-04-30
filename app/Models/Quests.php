<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface QuestsTpl
{
    public function getQuestsMap();

}


class Quests extends Model implements QuestsTpl
{
    use HasFactory;


    public function getQuestsMap ($id_user = false)
    {
        return $id_user

            ? DB::select("SELECT
                `quests_map`.`level`,
                MAX(`quests_users`.`id_quest_map`) as `currentId`,
                MAX(`quests_map`.`id`) AS `lastId`,
                MIN(`quests_map`.`id`) AS `firstId`,

                COUNT(`quests_map`.`id_levels_template`) AS `count`,

                (SELECT MIN(`quests_map_2`.`id`)
                    FROM `quests_map` AS `quests_map_2`
                    WHERE `quests_map_2`.`level` = `quests_map`.`level`
                    AND `quests_map_2`.`id` > MAX(`quests_users`.`id_quest_map`))
                    AS `nextId`,

                (SELECT COUNT(`quests_map_3`.`id_levels_template`)
                    FROM `quests_map` AS `quests_map_3`
                    WHERE `quests_map_3`.`id` <= MAX(`quests_users`.`id_quest_map`)
                    AND `quests_map_3`.`level` = `quests_map`.`level`)
                    AS `passedNum`,

                (SELECT `quest_name`
                    FROM `quest_levels_templates` AS `quest_levels_templates`
                    WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`)
                AS `quest_name`,


                (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
                FROM `quests_map`
                LEFT JOIN `quests_users`
                    ON `quests_users`.`id_quest_map` = `quests_map`.`id`
                    AND `quests_users`.`id_user` = :id_user
                    AND `quests_users`.`mistakes_num` < 3

                GROUP BY `level`, `quest_name` "
                ,['id_user' => $id_user]
                )


            : DB::select("SELECT
                `level`,
                MIN(`id`) as `firstId`,
                MAX(`id`) AS `lastId`,
                COUNT(`id_levels_template`) AS `count`,
                (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
                (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
                FROM `quests_map`
                WHERE `id_levels_template`=`id_levels_template`
                GROUP BY `level`, `quest_name` ");

    }


}

// ? DB::select("SELECT
// `quests_map`.`level`,
// MAX(`quests_users`.`id_quest_map`) as `currentId`,
// MAX(`quests_map`.`id`) AS `lastId`,
// MIN(`quests_map`.`id`) AS `firstId`,

// COUNT(`quests_map`.`id_levels_template`) AS `count`,

// (SELECT MIN(`quests_map_2`.`id`)
//     FROM `quests_map` AS `quests_map_2`
//     WHERE `quests_map_2`.`level` = `quests_map`.`level`
//     AND `quests_map_2`.`id` > MAX(`quests_users`.`id_quest_map`))
//     AS `nextId`,

// (SELECT COUNT(`quests_map_3`.`id_levels_template`)
//     FROM `quests_map` AS `quests_map_3`
//     WHERE `quests_map_3`.`id` <= MAX(`quests_users`.`id_quest_map`)
//     AND `quests_map_3`.`level` = `quests_map`.`level`)
//     AS `passedNum`,

//     (SELECT `quest_name`
//     FROM `quest_levels_templates` AS `quest_levels_templates`
//     WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`)
// AS `quest_name`,


// (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
// FROM `quests_map`
// LEFT JOIN `quests_users`
//     ON `quests_users`.`id_quest_map` = `quests_map`.`id`
//     AND `quests_users`.`id_user` = :id_user
//     AND `quests_users`.`mistakes_num` < 3

// GROUP BY `level`, `quest_name` ",
// ['id_user' => $id_user])
