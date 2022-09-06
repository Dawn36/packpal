<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_banner')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('landline_no')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('primary_business')->nullable();
            $table->string('specify')->nullable();
            $table->dateTime('establishment_year')->nullable();
            $table->string('annual_sales')->nullable();
            $table->string('certifications')->nullable();
            $table->string('seller_of')->nullable();
            $table->string('buyer_of')->nullable();
            $table->string('categories_id')->nullable();
            $table->string('sub_categories_id')->nullable();
            $table->string('description')->nullable();
            $table->enum('verified', ['yes', 'no'])->default('no');
            $table->enum('send_doc', ['yes', 'no'])->default('no');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
