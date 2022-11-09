<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\User;

class Bids extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'categories_id', 'sub_categories_id',
        'bids_name', 'location', 'city_post_code',
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
    public function getAddsImage(int $bidid)
    {
        return DB::select(DB::raw("Select * from `bid_images` where deleted_at IS NULL AND bids_id='$bidid'"));
    }
    public function bidStatusCount(int $userId)
    {
        return DB::select(DB::raw("select sum(CASE
        WHEN `status` = 'active' THEN 1
        ELSE 0
    END) as active_bids,
    SUM(CASE
        WHEN `status` = 'pending' THEN 1
        ELSE 0
    END) AS pending_bids,
    SUM(CASE
        WHEN `status` = 'denied' THEN 1
        ELSE 0
    END) AS denid_bids,
    SUM(CASE
        WHEN `status` = 'inactive' THEN 1
        ELSE 0
    END) AS inactive_bids,
    SUM(CASE
        WHEN `status` = 'completed' THEN 1
        ELSE 0
    END) AS completed_bids
    from `bids` b
    where deleted_at is null and user_id='$userId'"));
    }
}
