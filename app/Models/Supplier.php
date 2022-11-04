<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;
    public function supplierListing($categoryId,   $subCategoryId ,$search='',$orderBy='')
    {
        if(empty($orderBy))
        {
            $orderBy='desc';
        }
        return DB::table('users AS u')
            ->leftJoin('reviews AS r', 'u.id', '=', 'r.to_user_id')
            ->leftJoin('categories AS c', 'c.id', '=', 'u.categories_id')
            ->leftJoin('sub_categories AS sc', 'sc.id', '=', 'u.sub_categories_id')
            ->select(DB::raw('u.`id` AS user_id,u.`verified`,u.`company_banner`,u.`company_name`,u.`company_logo`,u.`first_name`,u.`last_name`,c.`id` AS cat_id,c.`category_name`,sc.`sub_category_name`,(((SUM(star) / 5) / COUNT(to_user_id)) * 5) AS rating,COUNT(to_user_id) as rating_count '))
            ->whereNull('u.deleted_at')
            ->where('u.user_type','2')
            ->when($categoryId, function ($query, $categoryId) {

                return $query->where('c.id', $categoryId);
            })
            ->when($subCategoryId, function ($query, $subCategoryId) {
                return $query->where('sc.id', $subCategoryId);
            })
            ->when($search, function ($query, $search) {
                return $query->where('u.first_name','LIKE', '%'.$search.'%');
            })
            ->orderBy('u.id', $orderBy)
            ->groupBy('u.id')->paginate(10)->appends('newold', $orderBy)->appends('category_id', $categoryId)->appends('sub_category_id', $subCategoryId)->appends('search', $search);
        // ->get();
    }
    public function supplierReviews($userId)
    {
        return DB::table('reviews AS r')
            ->select(DB::raw('(((SUM(star) / 5) / COUNT(to_user_id)) * 5) AS rating '))
            ->whereNull('r.deleted_at')
            ->where('r.to_user_id', $userId)->get();

        // ->get();
    }
}
