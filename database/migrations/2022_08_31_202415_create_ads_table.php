<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ads_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('path')->nullable();
            $table->string('size')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->enum('status', ['top', 'middle', 'last'])->default('top');
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
        Schema::dropIfExists('ads');
    }
}
