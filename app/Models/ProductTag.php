<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'product_tags';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['created_by', 'updated_by', 'title', 'remark', 'status','slug'];
    public function product()
    {




        return $this->belongsToMany('App\Models\Product', 'id');
    }

   
}
