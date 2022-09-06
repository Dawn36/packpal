<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  use HasFactory;
  protected $table = 'chat';
  public function getUserContact(int $userId)
  {
    return DB::select(DB::raw("select 
    t.id AS therd_id,
    u.id AS  user_id,
     u.`first_name`,
     u.`last_name`,
     u.`email`,
     u.`profile_picture` ,
     count(c.is_read) AS is_read,
     t.last_message_date 
   from
     `therd` t
     inner join users u
     on REPLACE(
       CONCAT(user_id_from, user_id_to),
       '$userId',
       ''
     ) =u.`id`
     left join chat c
     on c.therd_id=t.id
     AND c.user_id=REPLACE(
      CONCAT(user_id_from, user_id_to),
      '$userId',
      ''
    )
     and c.is_read='no'
   where user_id_from = '$userId' 
     or user_id_to = '$userId'
     group by u.id
     order by t.last_message_date desc
   
   "));
  }
}
