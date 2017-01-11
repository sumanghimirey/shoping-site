<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product-attribute';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['created_by', 'updated_by', 'title', 'slug', 'status'];


}
