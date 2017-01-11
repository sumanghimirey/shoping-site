<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['created_by', 'updated_by', 'menu_id', 'title', 'slug', 'banner', 'description', 'status'];

    public function menuBKP()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu', 'menu_pages', 'menu_id', 'page_id')->withPivot('menu_id', 'page_id', 'page_order');
    }

}
