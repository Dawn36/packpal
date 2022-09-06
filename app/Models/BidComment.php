<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BidComment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'bids_id', 'comment',
        'created_by',
        'updated_by', 'created_at', 'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
