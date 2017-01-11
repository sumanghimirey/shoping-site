<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['id', 'created_by', 'updated_by', 'category_id', 'name', 'slug', 'old_price', 'new_price',
        'quantity', 'short_desc', 'long_desc', 'main_image', 'seo_title', 'seo_description', 'seo_keyword',
        'view_count', 'status'];

    public function ProductCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }
    public function ProductTag()
    {
        return $this->belongsToMany('App\Models\ProductTag', 'product-product-tag', 'product_id', 'tag_id');
    }

    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImages', 'product_id');
    }


    public function productAttributeSpec()
    {
        return $this->hasMany('App\Models\ProductAttributeSpecification', 'product_id');
    }


}
