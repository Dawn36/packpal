<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Bids;
use App\Models\Categories;
use App\Models\SubCategories;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'primary_business', 'establishment_year',
        'annual_sales', 'certifications', 'seller_of',
        'categories_id', 'sub_categories_id', 'description',
        'buyer_of', 'first_name', 'last_name','user_type',
        'middle_name', 'designation', 'department',
        'address', 'country', 'city',
        'zip_postal_code', 'landline_no', 'phone_number',
        'email', 'password', 'created_at',
        'updated_at', 'company_logo', 'company_banner', 'specify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function bids()
    {
        return $this->hasMany(Bids::class);
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function subCategories()
    {
        return $this->belongsTo(SubCategories::class);
    }
}
