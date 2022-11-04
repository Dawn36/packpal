<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
  use HasFactory, SoftDeletes;
  protected $fillable = [
    's_user_id',
    'b_user_id',
    'bids_id',
    'categories_id',
    'sub_categories_id',
    'offer_price',
    'status',
    'feed_back',
    'created_at',
    'created_by',
    'updated_at',
    'updated_by',

  ];
  public function orderDataBuyer(string $status, int $userId)
  {
    return DB::table('orders AS o')
      ->join('bids AS b', 'b.id', '=', 'o.bids_id')
      ->join('categories AS c', 'c.id', '=', 'o.categories_id')
      ->join('sub_categories AS sc', 'sc.id', '=', 'o.sub_categories_id')
      ->join('users AS u', 'u.id', '=', 'o.s_user_id')
      ->select(DB::raw('o.s_user_id,o.b_user_id,u.`id` AS user_id,u.categories_id AS cat_id,u.`profile_picture`,u.`first_name`,u.`last_name`,b.`id` AS bid_id ,b.`bids_name`,b.`thumbnail`,c.`category_name`,sc.`sub_category_name`,o.offer_price,o.feed_back,o.created_at,o.id'))
      
      ->whereNull('o.deleted_at')
      ->whereNull('b.deleted_at')
      ->where('o.status', $status)
      ->where('b.user_id', $userId)
      ->orderBy('o.id', 'desc')->get();
      // ->where('b.status', 'active')
  }
  public function orderDataSupplier(string $status, int $userId)
  {
    return DB::table('orders AS o')
      ->join('bids AS b', 'b.id', '=', 'o.bids_id')
      ->join('categories AS c', 'c.id', '=', 'o.categories_id')
      ->join('sub_categories AS sc', 'sc.id', '=', 'o.sub_categories_id')
      ->select(DB::raw('o.s_user_id,o.b_user_id,b.`id` AS bid_id,b.`bids_name`,b.`thumbnail`,c.`category_name`,sc.`sub_category_name`,o.offer_price,o.feed_back,o.created_at,o.id'))
     
      ->whereNull('o.deleted_at')
      ->whereNull('b.deleted_at')
      ->where('o.status', $status)
      ->where('o.s_user_id', $userId)
      ->orderBy('o.id', 'desc')->get();
      // ->where('b.status', 'active')
  }
  public function orderDataBit(int $bitId)
  {
    return DB::table('orders AS o')
      ->join('bids AS b', 'b.id', '=', 'o.bids_id')
      ->join('categories AS c', 'c.id', '=', 'o.categories_id')
      ->join('sub_categories AS sc', 'sc.id', '=', 'o.sub_categories_id')
      ->join('users AS u', 'u.id', '=', 'o.s_user_id')
      ->select(DB::raw('u.`id` AS user_id,u.`profile_picture`,u.`first_name`,u.`last_name`,b.`bids_name`,b.`thumbnail`,c.`category_name`,sc.`sub_category_name`,o.offer_price,o.feed_back,o.created_at,o.id,o.status'))
      ->where('b.status', 'active')
      ->where('o.status', '!=', 'reject')
      ->whereNull('o.deleted_at')
      ->whereNull('b.deleted_at')
      ->where('b.id', $bitId)
      ->orderBy('o.id', 'desc')->get();
  }
  public function orderDataBitReview($bitId = '',  $userId = '')
  {
    return DB::table('reviews AS r')
      ->join('users AS u', 'u.id', '=', 'r.from_user_id')
      ->select(DB::raw('r.`star`,u.`first_name`,u.`last_name`,r.`comment`,r.`created_at`,u.`profile_picture`'))
      ->whereNull('r.deleted_at')
      ->when($bitId, function ($query, $bitId) {
        return $query->where('r.bids_id', $bitId);
      })
      ->when($userId, function ($query, $userId) {
        return $query->where('r.to_user_id', $userId);
      })
      ->orderBy('r.id', 'desc')->get();
  }
  public function ratingCount(int $userId)
  {
    return DB::select(DB::raw("SELECT 
          SUM(
            CASE
              WHEN star = 5 
              THEN 1 
              ELSE 0 
            END) AS five_star ,
            SUM(
            CASE
              WHEN star = 4 
              THEN 1 
              ELSE 0 
            END) AS four_star ,
            SUM(
            CASE
              WHEN star = 3
              THEN 1 
              ELSE 0 
            END) AS three_star ,
            SUM(
            CASE
              WHEN star = 2 
              THEN 1 
              ELSE 0 
            END) AS two_star ,
            SUM(
            CASE
              WHEN star = 1 
              THEN 1 
              ELSE 0 
            END) AS one_star 
        FROM
        reviews 
        WHERE to_user_id = '$userId' "));
  }
  public function orderStatusCount(int $userId)
  {
    return DB::select(DB::raw("select sum(CASE
    WHEN `status` = 'offer' THEN 1
    ELSE 0
END) as offer,
SUM(CASE
    WHEN `status` = 'inprocess' THEN 1
    ELSE 0
END) AS inprocess,
SUM(CASE
    WHEN `status` = 'reject' THEN 1
    ELSE 0
END) AS reject,
SUM(CASE
    WHEN `status` = 'complete' THEN 1
    ELSE 0
END) AS complete
from `orders`
where deleted_at is null and s_user_id='$userId'"));
  }
  public function orderStatusCountBuyer(int $userId)
  {
    return DB::select(DB::raw("select sum(CASE
    WHEN `status` = 'offer' THEN 1
    ELSE 0
END) as offer,
SUM(CASE
    WHEN `status` = 'inprocess' THEN 1
    ELSE 0
END) AS inprocess,
SUM(CASE
    WHEN `status` = 'reject' THEN 1
    ELSE 0
END) AS reject,
SUM(CASE
    WHEN `status` = 'complete' THEN 1
    ELSE 0
END) AS complete
from `orders`
where deleted_at is null and b_user_id='$userId'"));
  }
}
