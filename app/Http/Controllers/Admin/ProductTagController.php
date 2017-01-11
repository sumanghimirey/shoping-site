<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductTag\AddProducttagValidation;
use App\Http\Requests\ProductTag\EditProducttagValidation;
use App\Models\Menu;
use App\Models\ProductTag;
use App\Models\ProductAttribute;
use DB, File;
use Illuminate\Http\Request;

class ProductTagController extends AdminBaseController
{
    protected $base_route = 'admin.product-tags';
    protected $view_path = 'admin.product-tag';
    protected $folder_name = 'product-tag';
    protected $folder_path;
    protected $page = 'Product-Tag';

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = ProductTag::select('id', 'title', 'slug','status', 'created_at','remark')->get();
        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
       //dd('ok add');
        $data = [];
       return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(AddProducttagValidation $request)
    {
       ProductTag::create([
           'title'   => $request->get('title'),
           'slug' => str_slug($request->get('title')),
           'remark'=>$request->get('remark'),
           'status'   => $request->get('status'),
        ]);

        $request->session()->flash('message', $this->page.' added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        if (!$data['row'] = ProductTag::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data'));
    }

    public function update(EditProducttagValidation $request, $id)
    {
        if (!$row = ProductTag::find($id))
            return redirect()->route('admin.error', ['code' => '500']);


        $row->update([
            'title'   => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'remark' => $request->get('remark'),            
            'status'   => $request->get('status'),
        ]);

        $request->session()->flash('message', $this->page.' updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        if (!$row = ProductTag::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        $row->delete();
        $request->session()->flash('message', $this->page.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }



}