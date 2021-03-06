<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class History extends Model
{
    use HasFactory;

    public function getHistory ($id_user = false)
    {
        $id_user = $id_user ?? Auth::user()->id();

        return DB::select("SELECT
            DATE(`created_at`) AS `created`,
            SUM(`answers_num`) AS `corrects`,
            SUM(`mistakes_num`) AS `mistakes`,
            COUNT(`quests_users`.`id`) AS `all`,
            SUM(`quests_map`.`level`) / COUNT(`quests_users`.`id`) AS `level`,
            (SELECT COUNT(`quests_users_1`.`id`) FROM `quests_users` AS `quests_users_1`
                WHERE DATE(`quests_users_1`.`created_at`) = DATE(`quests_users`.`created_at`)
                AND `quests_users_1`.`mistakes_num` < 3
                AND `quests_users_1`.`id_user` = `quests_users`.`id_user`)
                AS `win`
            FROM `quests_users`, `quests_map`
            WHERE `quests_users`.`id_user` = :id_user
            AND `quests_map`.`id` = `quests_users`.`id_quest_map`
            GROUP BY `created`
            ORDER BY `created` DESC
            ", ['id_user' => $id_user]);
    }


    public function getUserCount ()
    {
        return DB::select("SELECT COUNT(`id`) AS `users` FROM `users`");
    }


    public function getQuestsCount ($id_user = false)
    {
        return $id_user

            ? DB::select("SELECT COUNT(`id`) AS `userQuestsPassed`
                FROM `quests_users`
                WHERE `mistakes_num` < 3
                AND `id_user` = :id_user", ['id_user' => $id_user])

            : DB::select("SELECT COUNT(`id`) AS `quests` FROM `quests_map`");
    }


    public function getTasksCount ($id_user = false)
    {
        return $id_user

            ? DB::select("SELECT SUM(`answers_num`) AS `countTasksUsers`
                FROM `quests_users`
                WHERE `mistakes_num` < 3
                AND `id_user` = :id_user", ['id_user' => $id_user])

            : DB::select("SELECT SUM(`quest_levels_templates`.`count`) AS `countTasks`
                FROM `quests_map`, `quest_levels_templates`
                WHERE `quests_map`.`id_levels_template` = `quest_levels_templates`.`id`");
    }


    public function getLevelsCount ($id_user = false)
    {
        return $id_user

            ? DB::select("SELECT MAX(`quests_map`.`level`) AS `maxUserLevel`
                FROM `quests_map`, `quests_users`
                WHERE `quests_users`.`id_quest_map` = `quests_map`.`id`
                AND `mistakes_num` < 3
                AND `id_user` = :id_user", ['id_user' => $id_user])

            : DB::select("SELECT MAX(`level`) AS `maxLevel` FROM `quests_map`");
    }




}











    // public function getQuestsMap ($id_user = false)
    // {
    //     return $id_user

    //         ? DB::select("SELECT
    //             `quests_map`.`level`,
    //             MAX(`quests_users`.`id_quest_map`) as `currentId`,
    //             MAX(`quests_map`.`id`) AS `lastId`,
    //             MIN(`quests_map`.`id`) AS `firstId`,

    //             -- COUNT(`quests_map`.`id_levels_template`) AS `count`,
    //             -- COUNT(`quests_map_count`.`id_levels_template`) AS `count`


    //             (SELECT MIN(`quests_map_2`.`id`)
    //                 FROM `quests_map` AS `quests_map_2`
    //                 WHERE `quests_map_2`.`level` = `quests_map`.`level`
    //                 AND `quests_map_2`.`id` > MAX(`quests_users`.`id_quest_map`))
    //                 AS `nextId`,

    //             (SELECT COUNT(`quests_map_3`.`id_levels_template`)
    //                 FROM `quests_map` AS `quests_map_3`
    //                 WHERE `quests_map_3`.`id` <= MAX(`quests_users`.`id_quest_map`)
    //                 AND `quests_map_3`.`level` = `quests_map`.`level`)
    //                 AS `passedNum`,

    //             (SELECT `quest_name`
    //                 FROM `quest_levels_templates` AS `quest_levels_templates`
    //                 WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`)
    //             AS `quest_name`,

    //             (SELECT COUNT(`quests_map_count`.`id_levels_template`)
    //                 FROM `quests_map` AS `quests_map_count`,
    //                 `quest_levels_templates` AS `quest_levels_templates_count`

    //                 -- WHERE   `quests_map_count`.`id_levels_template` = `quests_map`.`id_levels_template`
    //                 WHERE     `quests_map_count`.`id_levels_template` = `quest_levels_templates_count`.`id`

    //                 AND `quest_levels_templates_count`.`quest_name` = `quest_name`
    //                 AND `quest_levels_templates_count`.`quest_name` = `quest_levels_templates_count`.`quest_name`

    //                 AND `quests_map_count`.`level` = `quests_map`.`level`

    //                 -- GROUP BY `quest_levels_templates_count`.`quest_name`
    //                 -- LIMIT 1
    //                 )
    //                 AS `count`,


    //             (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
    //             FROM `quests_map`
    //             LEFT JOIN `quests_users`
    //                 ON `quests_users`.`id_quest_map` = `quests_map`.`id`
    //                 AND `quests_users`.`id_user` = :id_user
    //                 AND `quests_users`.`mistakes_num` < 3
    //             GROUP BY `level`, `quest_name` "
    //             ,['id_user' => $id_user]
    //             )


    //         : DB::select("SELECT
    //             `level`,
    //             MIN(`id`) as `firstId`,
    //             MAX(`id`) AS `lastId`,
    //             COUNT(`id_levels_template`) AS `count`,
    //             (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
    //             (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
    //             FROM `quests_map`
    //             WHERE `id_levels_template`=`id_levels_template`
    //             GROUP BY `level`, `quest_name` ");

    // }


    // public function getAllQuestMap ()
    // {

    // }

// }

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
