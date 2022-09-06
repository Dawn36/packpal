<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('categories_id');
            $table->bigInteger('sub_categories_id');
            $table->string('product_name')->nullable();
            $table->string('location')->nullable();
            $table->string('city_post_code')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('target_price')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending', 'denied'])->default('pending');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id');
            $table->bigInteger('user_id');
            $table->string('file_name')->nullable();
            $table->string('path')->nullable();
            $table->string('size')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id');
            $table->bigInteger('user_id');
            $table->string('comment')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_comments');
    }
}
