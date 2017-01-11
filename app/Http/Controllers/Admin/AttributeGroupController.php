<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\AddMenuValidation;
use App\Http\Requests\Menu\EditMenuValidation;
use App\Models\AttributeGroup;
use DB, File;
use Illuminate\Http\Request;

class AttributeGroupController extends AdminBaseController
{
    protected $base_route = 'admin.attribute-groups';
    protected $view_path = 'admin.attribute-group';
    protected $folder_name = 'attribute-group';
    protected $folder_path;
    protected $page = 'Attribute Group';

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = AttributeGroup::select('id', 'title', 'slug','status', 'created_at')->get();
        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
        $data = [];
       return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(AddMenuValidation $request)
    {
       AttributeGroup::create([
           'title'   => $request->get('title'),
           'slug' => str_slug($request->get('title')),
           'status'   => $request->get('status'),
        ]);

        $request->session()->flash('message', $this->page.' added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        if (!$data['row'] = AttributeGroup::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data'));
    }

    public function update(EditMenuValidation $request, $id)
    {
        if (!$row = AttributeGroup::find($id))
            return redirect()->route('admin.error', ['code' => '500']);


        $row->update([
            'title'   => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'status'   => $request->get('status'),
        ]);

        $request->session()->flash('message', $this->page.' updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        if (!$row = AttributeGroup::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        $row->delete();
        $request->session()->flash('message', $this->page.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }



}