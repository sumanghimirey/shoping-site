<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['created_by', 'updated_by', 'title', 'key', 'description', 'status'];

    public function pagesOld()
    {
        return $this->hasMany('App\Models\Page', 'menu_id');
    }


    public function pages()
    {
        return $this->belongsToMany('App\Models\Page', 'menu_pages', 'menu_id', 'page_id')->withPivot('page_order');
    }


}
