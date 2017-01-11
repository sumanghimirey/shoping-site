<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeSpecification extends Model
{
    protected $table = 'product-attribute-spec';

    protected $fillable = ['id', 'created_by', 'updated_by', 'product_id', 'product-attribute-group_id',
        'product-attribute_id', 'value', 'status'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

}
