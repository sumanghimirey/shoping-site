<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale', function () {
    return view('login');
});

Route::get('/layout', function () {
    return view('layout');
});

Auth::routes();
//Route::get('/home/{count}/{apple}/city', 'HomeController@index');


Route::get('home',      ['as' => 'home_page',    'uses' => 'HomeController@index']);
Route::get('testing/{par1}/{par2}',   ['as' => 'test',         'uses' => 'HomeController@test']);

Route::get('home',                                      ['as' => 'home_page',                   'uses' => 'HomeController@index']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Admin\\'], function () {

    Route::get('dashboard',                           ['as' => 'dashboard',             'uses' => 'DashboardController@index']);
    Route::get('error/{code}',                        ['as' => 'error',                 'uses' => 'DashboardController@error']);

    Route::get('users',                               ['as' => 'users.index',           'uses' => 'UserController@index']);
    Route::get('user/add',                            ['as' => 'users.add',             'uses' => 'UserController@add']);
    Route::post('user/store',                         ['as' => 'users.store',           'uses' => 'UserController@store']);
    Route::get('user/{id}/edit',                      ['as' => 'users.edit',            'uses' => 'UserController@edit']);
    Route::post('user/{id}/update',                   ['as' => 'users.update',          'uses' => 'UserController@update']);
    Route::get('user/{id}/delete',                    ['as' => 'users.delete',          'uses' => 'UserController@delete']);

    Route::get('pages',                               ['as' => 'pages.index',           'uses' => 'PageController@index']);
    Route::get('page/add',                            ['as' => 'pages.add',             'uses' => 'PageController@add']);
    Route::post('page/store',                         ['as' => 'pages.store',           'uses' => 'PageController@store']);
    Route::get('page/{id}/edit',                      ['as' => 'pages.edit',            'uses' => 'PageController@edit']);
    Route::post('page/{id}/update',                   ['as' => 'pages.update',          'uses' => 'PageController@update']);
    Route::get('page/{id}/delete',                    ['as' => 'pages.delete',          'uses' => 'PageController@delete']);

    Route::get('menus',                               ['as' => 'menus.index',           'uses' => 'MenuController@index']);
    Route::get('menu/add',                            ['as' => 'menus.add',             'uses' => 'MenuController@add']);
    Route::post('menu/store',                         ['as' => 'menus.store',           'uses' => 'MenuController@store']);
    Route::get('menu/{id}/edit',                      ['as' => 'menus.edit',            'uses' => 'MenuController@edit']);
    Route::post('menu/{id}/update',                   ['as' => 'menus.update',          'uses' => 'MenuController@update']);
    Route::get('menu/{id}/delete',                    ['as' => 'menus.delete',          'uses' => 'MenuController@delete']);
    Route::get('menu/get-page-row',                   ['as' => 'menus.get-page-row',    'uses' => 'MenuController@getPageRowHtml']);

    Route::get('product-tags',                  ['as' => 'product-tags.index',       'uses' => 'ProductTagController@index']);
    Route::get('product-tag/add',               ['as' => 'product-tags.add',          'uses' => 'ProductTagController@add']);
    Route::post('product-tag/store',            ['as' => 'product-tags.store',        'uses' => 'ProductTagController@store']);
    Route::get('product-tag/{id}/edit',         ['as' => 'product-tags.edit',         'uses' => 'ProductTagController@edit']);
    Route::post('product-tag/{id}/update',      ['as' => 'product-tags.update',        'uses' => 'ProductTagController@update']);
    Route::get('product-tag/{id}/delete',       ['as' => 'product-tags.delete',     'uses' => 'ProductTagController@delete']);

    Route::get('product-attributes',                       ['as' => 'product-attributes.index',           'uses' => 'ProductAttributeController@index']);
    Route::get('product-attribute/add',                    ['as' => 'product-attributes.add',             'uses' => 'ProductAttributeController@add']);
    Route::post('product-attribute/store',                 ['as' => 'product-attributes.store',           'uses' => 'ProductAttributeController@store']);
    Route::get('product-attribute/{id}/edit',              ['as' => 'product-attributes.edit',            'uses' => 'ProductAttributeController@edit']);
    Route::post('product-attribute/{id}/update',           ['as' => 'product-attributes.update',          'uses' => 'ProductAttributeController@update']);
    Route::get('product-attribute/{id}/delete',            ['as' => 'product-attributes.delete',          'uses' => 'ProductAttributeController@delete']);


    Route::get('attribute-groups',                        ['as' => 'attribute-groups.index',           'uses' => 'AttributeGroupController@index']);
    Route::get('attribute-group/add',                     ['as' => 'attribute-groups.add',             'uses' => 'AttributeGroupController@add']);
    Route::post('attribute-group/store',                  ['as' => 'attribute-groups.store',           'uses' => 'AttributeGroupController@store']);
    Route::get('attribute-group/{id}/edit',               ['as' => 'attribute-groups.edit',            'uses' => 'AttributeGroupController@edit']);
    Route::post('attribute-group/{id}/update',            ['as' => 'attribute-groups.update',          'uses' => 'AttributeGroupController@update']);
    Route::get('attribute-group/{id}/delete',             ['as' => 'attribute-groups.delete',          'uses' => 'AttributeGroupController@delete']);

    Route::get('banner',                                  ['as' => 'banners.index',           'uses' => 'BannerController@index']);
    Route::get('banner/add',                              ['as' => 'banners.add',             'uses' => 'BannerController@add']);
    Route::post('banner/store',                           ['as' => 'banners.store',           'uses' => 'BannerController@store']);
    Route::get('banner/{id}/edit',                        ['as' => 'banners.edit',            'uses' => 'BannerController@edit']);
    Route::post('banner/{id}/update',                     ['as' => 'banners.update',          'uses' => 'BannerController@update']);
    Route::get('banner/{id}/delete',                      ['as' => 'banners.delete',          'uses' => 'BannerController@delete']);
    Route::post('banner/{id}/ajax',                       ['as' => 'banners.ajax',            'uses' => 'BannerController@ajax']);


    Route::get('product-categorys',                        ['as' => 'product-categorys.index',           'uses' => 'ProductCategoryController@index']);
    Route::get('product-category/add',                    ['as' => 'product-categorys.add',             'uses' => 'ProductCategoryController@add']);
    Route::post('product-category/store',                 ['as' => 'product-categorys.store',           'uses' => 'ProductCategoryController@store']);
    Route::get('product-category/{id}/edit',              ['as' => 'product-categorys.edit',            'uses' => 'ProductCategoryController@edit']);
    Route::post('product-category/{id}/update',           ['as' => 'product-categorys.update',          'uses' => 'ProductCategoryController@update']);
    Route::get('product-category/{id}/delete',            ['as' => 'product-categorys.delete',          'uses' => 'ProductCategoryController@delete']);
    Route::post('product-category/{id}/ajax',             ['as' => 'product-categorys.ajax',            'uses' => 'ProductCategoryController@ajax']);

    Route::get('products',                                ['as' => 'products.index',                    'uses' => 'ProductController@index']);
    Route::get('product/add',                             ['as' => 'products.add',                      'uses' => 'ProductController@add']);
    Route::post('product/store',                          ['as' => 'products.store',                    'uses' => 'ProductController@store']);
    Route::get('product/{id}/edit',                       ['as' => 'products.edit',                     'uses' => 'ProductController@edit']);
    Route::post('product/{id}/update',                    ['as' => 'products.update',                   'uses' => 'ProductController@update']);
    Route::get('product/{id}/delete',                     ['as' => 'products.delete',                   'uses' => 'ProductController@delete']);
    Route::post('product/getAttributeHtml',               ['as' => 'products.getAttributeHtml',        'uses' => 'ProductController@getAttributeHtml']);
    Route::post('product/getImageHtml',                   ['as' => 'products.getImageHtml',            'uses' => 'ProductController@getImageHtml']);


});
