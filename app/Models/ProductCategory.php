<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'category';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['id','created_by', 'updated_by', 'title', 'slug', 'short_desc', 'long_desc', 'main_image', 'seo_title', 'seo_description', 'seo_keyword', 'status'];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'category_id', 'product_id');
    }
}
