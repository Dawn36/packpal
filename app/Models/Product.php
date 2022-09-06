<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'categories_id', 'sub_categories_id',
        'product_name', 'location', 'city_post_code',
        'contact_no', 'description', 'thumbnail',
        'target_price', 'status', 'created_by',
        'updated_by', 'created_at', 'updated_at'
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function subCategories()
    {
        return $this->belongsTo(SubCategories::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getAddsImage(int $productId)
    {
        return DB::select(DB::raw("Select * from `product_images` where deleted_at IS NULL AND products_id='$productId'"));
    }
    public function productStatusCount(int $userId)
    {
        return DB::select(DB::raw("select sum(CASE
        WHEN `status` = 'active' THEN 1
        ELSE 0
    END) as active_product,
    SUM(CASE
        WHEN `status` = 'pending' THEN 1
        ELSE 0
    END) AS pending_product,
    SUM(CASE
        WHEN `status` = 'denid' THEN 1
        ELSE 0
    END) AS denid_product,
    SUM(CASE
        WHEN `status` = 'inactive' THEN 1
        ELSE 0
    END) AS inactive_product
    from `products`
    where deleted_at is null and user_id='$userId'"));
    }
}
