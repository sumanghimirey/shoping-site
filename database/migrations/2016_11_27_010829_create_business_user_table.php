<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussiness-users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->string('gender', 255);
            $table->mediumText('fb_link');
            $table->mediumText('twiter_link');
            $table->mediumText('billing_address');
            $table->mediumText('billgin_country');
            $table->mediumText('shiping_address');
            $table->mediumText('shiping_country');
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bussiness-users');
    }
}
