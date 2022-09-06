<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Bids;

class SubCategories extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'categories_id',
        'sub_category_name',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
    public function bid()
    {
        return $this->hasMany(Bids::class);
    }
}
