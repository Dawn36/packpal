<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Bids;
use App\Models\User;

class Categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
        'category_image',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];

    public function bids()
    {
        return $this->hasMany(Bids::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
