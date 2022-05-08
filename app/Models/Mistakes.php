<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

interface MistakesTpl
{
    public function getMistakes ($idUser);
    public function deleteMistakes ($idUser, $idMistakes); // id_user, id_quest_map, answers_num,	mistakes_num
}


class Mistakes extends Model implements MistakesTpl
{
    use HasFactory;


    public function getMistakes ($idUser)
    {
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
    }



    public function deleteMistakes ($idUser, $idMistakes)
    {
        return count($idMistakes) && DB::select("DELETE FROM `user_mistakes` WHERE `user_mistakes`.`id` IN (".implode(",", $idMistakes).")");
    }



}
