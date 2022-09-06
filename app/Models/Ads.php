<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name', 'path', 'size',
        'created_by','ads_name',
        'updated_by', 'status', 'created_at','updated_at'
    ];
}
