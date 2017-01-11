<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('category_id');
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->double('old_price', 10, 2);
            $table->double('new_price', 10, 2);
            $table->tinyInteger('quantity');
            $table->mediumText('short_desc');
            $table->text('long_desc');
            $table->mediumText('main_image');
            $table->mediumText('seo_title');
            $table->mediumText('seo_description');
            $table->mediumText('seo_keyword');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('view_count');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
