<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface QuestsMapTpl 
{


}


class QuestsMap extends Model
{
    use HasFactory;


    public function getQuestMap ()
    {
        // return DB::table('quests_map')
        //     ->select('level', 'id_levels_template')
        //     ->get()
        //     ->groupBy('level')
        //     ->toJson();



        return DB::select("SELECT
                `level`, COUNT(`id_levels_template`) AS `count`,
                (SELECT `quest_name` FROM `quest_levels_templates` WHERE `quest_levels_templates`.`id`=`quests_map`.`id_levels_template`) AS `quest_name`,
                (SELECT `title` FROM `quests_templates` WHERE `quests_templates`.`name`=`quest_name`) AS `title`
                FROM `quests_map`
                WHERE `id_levels_template`=`id_levels_template` 
                GROUP BY `level`, `quest_name` ");

        // return DB::select("SELECT
        //         `quests_map`.`name`,`quest_tpls`.`title`,`quest_tpls`.`cat_title`, `quest_tpls`.`name_title`,
        //         (SELECT MAX(`quest_tpls_levels`.`level`)
        //             FROM `quest_tpls_levels`
        //             WHERE `quest_tpls_levels`.`quest_name` = `quest_tpls`.`name`
        //         ) AS `max_level`
        //         ". ( $email ? ",
        //         (SELECT MAX(`quests`.`level`)
        //             FROM `quests`
        //             WHERE `quests`.`email` = :email
        //               AND `quests`.`quest_tpl` = `quest_tpls`.`name`
        //               AND `quests`.`mistakes` < 3
        //         ) AS `user_level`
        //         " : "" ). "
        //         FROM `quest_tpls`, `quest_tpls_cat`
        //         WHERE `quest_tpls_cat`.`cat_title`=`quest_tpls`.`cat_title`
        //         ORDER BY `quest_tpls_cat`.`priority` ASC,  `quest_tpls`.`priority`
        //             ", $email ? ['email' => $email] : []);


    }


}
