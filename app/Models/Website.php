<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    public function bidListing($categoryId='',   $subCategoryId='',$search='',$orderBy='')
    {
        if(empty($orderBy))
        {
            $orderBy='desc';
        }
        return DB::table('bids AS b')
            ->join('categories AS c', 'c.id', '=', 'b.categories_id')
            ->join('sub_categories AS sc', 'sc.id', '=', 'b.sub_categories_id')
            ->join('users AS u', 'u.id', '=', 'b.user_id')
            ->select(DB::raw(' b.`id` AS bid_id,
            b.`thumbnail`,
            b.`target_price`,
            c.`id` AS cat_id,
            c.`category_name`,
            sc.`id` AS sub_cat_id,
            sc.`sub_category_name`,
            u.`id` AS user_id,
            b.`bids_name`,
            u.`address`,
            u.`city`,
            u.`first_name`,
            u.`last_name`,
            u.`middle_name`,
            u.`profile_picture`'))
            ->whereNull('b.deleted_at')
            ->where('b.status','active')
            ->where('b.show_bid','yes')
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('c.id', $categoryId);
            })
            ->when($search, function ($query, $search) {
                return $query->where('b.bids_name','LIKE', '%'.$search.'%');
            })
            ->when($subCategoryId, function ($query, $subCategoryId) {
                return $query->where('sc.id', $subCategoryId);
            })
            ->orderBy('b.id', $orderBy)->paginate(10)->appends('newold', $orderBy)->appends('category_id', $categoryId)->appends('sub_category_id', $subCategoryId)->appends('search', $search);
            // ->get();
            //->appends('category_id', $categoryId)->appends('sub_category_id', $subCategoryId)
        // ->get();
    }
    public function getCatAndSubCat()
    {
        return DB::table('categories AS c')
            ->join('sub_categories AS sc', 'c.id', '=', 'sc.categories_id')
            ->select(DB::raw(' c.`id` AS cat_id,
            GROUP_CONCAT(sc.id) AS sub_cat_id,
            c.`category_image`,
            c.`category_name`,
            GROUP_CONCAT(sc.`sub_category_name`) AS sub_cat_name'))
            ->whereNull('c.deleted_at')
            ->groupBy('c.id')
            ->get();
            //->appends('category_id', $categoryId)->appends('sub_category_id', $subCategoryId)
        // ->get();
    }
    public function bidDetails(int $bidId)
    {
        return DB::select(DB::raw("  select 
        b.`id` AS bid_id,
        count(o.`bids_id`) AS bid_offer_count,
        b.`thumbnail`,
        b.`description`,
        b.`bids_name`,
        b.`categories_id` AS cat_id,
        b.`location`,
        b.`target_price`,
        b.`sub_categories_id` AS sub_cat_id,
        u.id AS user_id ,
        u.`first_name`,
        u.`middle_name`,
        u.`last_name`,
        u.`address`,
        u.`created_at`
      from
        `bids` b 
        inner join `users` u 
          on u.`id` = b.`user_id` 
          left join `orders` o
          on b.`id`=o.`bids_id`
          AND o.`status`='offer'
          AND o.deleted_at IS NULL
      where b.`id` = '$bidId' 
      
      group by o.`bids_id`"));
      
    }
}
