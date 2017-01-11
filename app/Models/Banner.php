<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model{

    protected $table = 'banners';

    protected $guarded = [];

    protected $fillable = ['alt_text', 'caption', 'image', 'link', 'status','slider_key'];

}