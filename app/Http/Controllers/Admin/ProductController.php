<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;


use App\Http\Requests\Product\ProductAddValidation;
use App\Http\Requests\Product\ProductEditValidation;
use App\Models\AttributeGroup;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeSpecification;
use App\Models\ProductImages;
use App\Models\ProductTag;
use App\Models\ProductCategory;
use DB, File;
use Illuminate\Http\Request;
use Image;

class ProductController extends AdminBaseController
{
    protected $base_route = 'admin.products';
    protected $view_path = 'admin.product';
    protected $folder_name = 'product';
    protected $folder_path;
    protected $main_image_dimensions;
    protected $gallery_image_dimensions;

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
        $this->main_image_dimensions = config('broadway.image.thumb-dimensions.product.main_image');
        $this->gallery_image_dimensions = config('broadway.image.thumb-dimensions.product.gallery_image');
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = Product::select('product.id', 'c.title as category_title', 'product.name',
            'product.created_at', 'product.updated_at', 'product.slug','product.old_price', 'product.new_price',
            'product.quantity', 'product.main_image','product.status')
            ->leftJoin('category as c', 'c.id', '=', 'product.category_id')
            ->orderBy('product.id', 'desc')
            ->get();
        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
        $data = [];
        $data['category'] = ProductCategory::select('id', 'title')->orderBy('title', 'asc')->get();
        $data['tag'] = ProductTag::select('id', 'title')->orderBy('title', 'asc')->get();
        return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(ProductAddValidation $request)
    {
        if ($request->hasFile('main_image')) {

            // check if folder exist
            // if not exist create folder
            parent::checkFolderExist();

            $image = $request->file('main_image');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);

            foreach ($this->main_image_dimensions as $dimension) {
                $thumb_image = Image::make($this->folder_path.$image_name)->resize($dimension['width'], $dimension['height']);
                $thumb_image->save($this->folder_path.$dimension['width'].'-'.$dimension['height'].'-'.$image_name);
            }

        }

        $product = Product::create([
           'category_id'         =>     $request->get('category_id'),
           'name'                =>     $request->get('name'),
           'slug'                =>     str_slug($request->get('name')),
           'old_price'           =>     $request->get('old_price'),
           'new_price'           =>     $request->get('new_price') == ''?$request->get('old_price'):$request->get('new_price'),
           'quantity'            =>     $request->get('quantity'),
           'short_desc'          =>     $request->get('short_desc'),
           'long_desc'           =>     $request->get('long_desc'),
           'main_image'          =>     isset($image_name)?$image_name:'',
           'seo_title'           =>     $request->get('seo_title'),
           'seo_description'     =>     $request->get('seo_description'),
           'seo_keyword'         =>     $request->get('seo_keyword'),
           'status'              =>     $request->get('status'),
           'view_count'          =>     '0',
            'created_by'         => auth()->user()->id,
        ]);

        // store image
        if ($request->hasFile('gallery_image')) {

            foreach ($request->file('gallery_image') as $key => $image) {

                // store image in folder
                $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
                $image->move($this->folder_path, $image_name);

                foreach ($this->gallery_image_dimensions as $dimension) {
                    $thumb_image = Image::make($this->folder_path.$image_name)->resize($dimension['width'], $dimension['height']);
                    $thumb_image->save($this->folder_path.$dimension['width'].'-'.$dimension['height'].'-'.$image_name);
                }

                $data = [
                    'created_by' => auth()->user()->id,
                    'product_id' => $product->id,
                    'image' => $image_name,
                    'caption' => $request->get('gallery_image_caption')[$key],
                    'alt_text' => $request->get('gallery_image_alt_text')[$key],
                    'rank' => $request->get('gallery_image_rank')[$key],
                    'status' => $request->get('gallery_image_status')[$key],
                ];

                ProductImages::create($data);
            }
            
        }
        
        
        
        // store Attribute Spec
        if ($request->has('value')) {


            foreach ($request->get('value') as $key => $value) {

                $data = [
                    'created_by' => auth()->user()->id,
                    'product_id' => $product->id,
                    'product-attribute-group_id' => $request->get('attribute_group')[$key],
                    'product-attribute_id' => $request->get('attribute')[$key],
                    'value' => $value,
                    'status' => 1
                ];

                ProductAttributeSpecification::create($data);

            }

        }

        // Product Tags
        $product->ProductTag()->sync($request->has('tag')?$request->get('tag'):[]);

        $request->session()->flash('message', 'Product added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        if (!$data['row'] = Product::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        $data['category'] = ProductCategory::select('id', 'title')->orderBy('title', 'asc')->get();
        $data['tag'] = ProductTag::select('id', 'title')->orderBy('title', 'asc')->get();
        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data'));
    }

    public function update(ProductEditValidation $request, $id)
    {
        if (!$product = Product::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        if ($request->hasFile('main_image')) {

            parent::checkFolderExist();

            if ($product->main_image) {
                // remove old image
                if (File::exists($this->folder_path.$product->main_image)) {
                    File::delete($this->folder_path.$product->main_image);
                }
            }

            $image = $request->file('main_image');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);

        }

        //dd('ok');
        $product->update([
            'category_id'         =>     $request->get('category_id'),
            'name'                =>     $request->get('name'),
            'slug'                =>     str_slug($request->get('name')),
            'old_price'           =>     $request->get('old_price'),
            'new_price'           =>     $request->get('new_price'),
            'quantity'            =>     $request->get('quantity'),
            'short_desc'          =>     $request->get('short_desc'),
            'long_desc'           =>     $request->get('long_desc'),
            'main_image'          =>     isset($image_name)?$image_name:$product->main_image,
            'seo_title'           =>     $request->get('seo_title'),
            'seo_description'     =>     $request->get('seo_description'),
            'seo_keyword'         =>     $request->get('seo_keyword'),
            'status'              =>     $request->get('status'),

        ]);

        // update page Set menu_id = 1, title = 'title'.....
        // where id = 4;


        $request->session()->flash('message', 'Product updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        if (!$page = Product::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        // remove image before deleting db row
        if ($page->banner) {
            // remove old image
            if (File::exists($this->folder_path.$page->banner)) {
                File::delete($this->folder_path.$page->banner);
            }
        }

        $page->delete();
        $request->session()->flash('message', 'Product deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function getAttributeHtml(Request $request)
    {
        $data = [];
        $data['html'] = view($this->view_path.'.partials.add.attribute-row', [
            'attribute_groups' => AttributeGroup::select('id', 'title')->orderBy('title')->get(),
            'attributes' => ProductAttribute::select('id', 'title')->orderBy('title')->get(),
        ])->render();

        return response()->json(json_encode($data));
    }

    public function getImageHtml(Request $request)
    {
        $data = [];
        $data['html'] = view($this->view_path.'.partials.add.image-row')->render();

        return response()->json(json_encode($data));
    }



}