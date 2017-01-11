<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product-images';

    protected $fillable = ['id', 'created_by', 'updated_by', 'product_id', 'rank',
        'image', 'alt_text', 'caption', 'status'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

}
