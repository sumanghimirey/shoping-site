<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'product-attribute-group';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['created_by', 'updated_by', 'title', 'slug', 'status'];


}
