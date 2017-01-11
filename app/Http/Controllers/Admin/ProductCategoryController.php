<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Requests\Category\CategoryAddValidation;
use App\Models\ProductCategory;
use DB, File;
use Illuminate\Http\Request;


class ProductCategoryController extends AdminBaseController
{
    protected $base_route = 'admin.product-categorys';
    protected $view_path = 'admin.product-category';
    protected $folder_name = 'category';
    protected $folder_path;

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    public function index(Request $request)
    {
        //dd('ok');
        $data = [];
        $data['rows'] = ProductCategory::select('id', 'created_by', 'updated_by', 'title', 'slug', 'short_desc', 'long_desc', 'main_image', 'seo_title', 'seo_description', 'seo_keyword', 'status')
            ->orderBy('id', 'desc')
            ->get();

        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
        //$data = [];
        //$data['category'] = ProductCategory::select('id', 'title')->orderBy('title', 'asc')->get();
        return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(CategoryAddValidation $request)
    {
        //dd('ok');
        if ($request->hasFile('main_image')) {

            // check if folder exist
            // if not exist create folder
            parent::checkFolderExist();

            $image = $request->file('main_image');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);
        }

       ProductCategory::create([
           //'title', 'slug', 'short_desc', 'long_desc', 'main_image', 'seo_title', 'seo_description', 'seo_keyword', 'status'
           'title'               =>     $request->get('title'),
           'slug'                =>     str_slug($request->get('title')),
           'short_desc'          =>     $request->get('short_desc'),
           'long_desc'           =>     $request->get('long_desc'),
           'main_image'          =>     isset($image_name)?$image_name:'',
           'seo_title'           =>     $request->get('seo_title'),
           'seo_description'     =>     $request->get('seo_description'),
           'seo_keyword'         =>     $request->get('seo_keyword'),
           'status'              =>     $request->get('status'),
        ]);

        $request->session()->flash('message', 'Category added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        //dd($id);
        $data = [];

        if (!$data['category'] = ProductCategory::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data'));
    }

    public function update(CategoryAddValidation $request, $id)
    {
        if (!$category = ProductCategory::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        if ($request->hasFile('main_image')) {

            parent::checkFolderExist();

            if ($category->main_image) {
                // remove old image
                if (File::exists($this->folder_path.$category->main_image)) {
                    File::delete($this->folder_path.$category->main_image);
                }
            }

            $image = $request->file('main_image');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);

        }

        $category->update([
            'title'               =>     $request->get('title'),
            'slug'                =>     str_slug($request->get('title')),
            'short_desc'          =>     $request->get('short_desc'),
            'long_desc'           =>     $request->get('long_desc'),
            'main_image'          =>     isset($image_name)?$image_name:$category->main_image,
            'seo_title'           =>     $request->get('seo_title'),
            'seo_description'     =>     $request->get('seo_description'),
            'seo_keyword'         =>     $request->get('seo_keyword'),
            'status'              =>     $request->get('status'),
        ]);




        $request->session()->flash('message', 'Category updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
       //dd('enter');
        if (!$page = ProductCategory::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        // remove image before deleting db row
        if ($page->banner) {
            // remove old image
            if (File::exists($this->folder_path.$page->banner)) {
                File::delete($this->folder_path.$page->banner);
            }
        }

        $page->delete();
        $request->session()->flash('message', 'Category deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }



}