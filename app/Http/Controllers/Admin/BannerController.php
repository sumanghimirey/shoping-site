<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Banner\BannerAddValidation;
use App\Http\Requests\Banner\BannerEditValidation;
use App\Models\Banner;
use DB, File;
use Illuminate\Http\Request;

class BannerController extends AdminBaseController {

    protected $base_route = 'admin.banners';
    protected $view_path = 'admin.banners';
    protected $folder_name = 'banner';
    protected $folder_path;

    public function __construct()
    {
        //parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
        //dd($this->folder_path);
    }

    public function index(Request $request)
    {

        $data = [];
        $data['banners'] = Banner::select('id', 'created_at', 'updated_at', 'image', 'alt_text', 'link', 'status')->get();
        return view($this->view_path.'.list', [
            'data' => $data
        ]);

    }

    public function add(Request $request)
    {
        return view($this->view_path.'.add');
    }

    public function store(BannerAddValidation $request)
    {
        if($request->hasFile('image')){
            parent::checkFolderExist();

            $image = $request->file('image');
            $image_name = rand(4747, 9999).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path,$image_name);
        }
     Banner::create([
         'alt_text' => $request->get('alt_text'),
         'caption' => $request->get('caption'),
         'image' => isset($image_name)?$image_name:'',
         'link' => $request->get('link'),
         'status' => $request->get('status'),
         'slider_key' => $request->get('slider_key')
     ]);
        $request->session()->flash('message', 'Banner Added Successfully');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request,$id)
    {
        $data = [];
        if(!$data['row'] = Banner::find($id)){
            dd('invalid request');
        }
            return view($this->view_path . '.edit', compact('data'));

    }

    public function update(BannerEditValidation $request,$id)
    {
        $banner = Banner::find($id);
        if($request->hasFile('image')){
            $image_path = $this->folder_path.$banner->image;

            if (File::exists($image_path)) {
                File::Delete($image_path);
            }
            parent::checkFolderExist();

            $image = $request->file('image');
            $image_name = rand(4747, 9999).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path,$image_name);
        }
        $banner->update([
            'alt_text' => $request->get('alt_text'),
            'caption' => $request->get('caption'),
            'image' => isset($image_name)?$image_name:$banner->image,
            'link' => $request->get('link'),
            'status' => $request->get('status'),
            'slider_key' => $request->get('slider_key')
        ]);
        $request->session()->flash('message', 'Banner updated successfully.');
        return redirect()->route($this->base_route.'.index');

    }

    public function delete(Request $request,$id)
    {
        if (!$banner = Banner::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        // remove image before deleting db row
        if ($banner->image) {
            // remove old image
            if (File::exists($this->folder_path.$banner->image)) {
                File::delete($this->folder_path.$banner->image);
            }
        }

        $banner->delete();
        $request->session()->flash('message', 'Banner deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    protected function checkFolderExist()
    {

        if (!File::exists($this->folder_path)){
            File::makeDirectory($this->folder_path);
        }
    }


}