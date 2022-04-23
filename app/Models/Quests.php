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


    public function getQuestsMap ()
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

    }


}
