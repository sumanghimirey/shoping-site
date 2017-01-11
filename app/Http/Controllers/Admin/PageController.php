<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Page\PageAddValidation;
use App\Http\Requests\Page\PageEditValidation;
use App\Models\Menu;
use App\Models\Page;
use App\User;
use DB, File;
use Illuminate\Http\Request;

class PageController extends AdminBaseController
{
    protected $base_route = 'admin.pages';
    protected $view_path = 'admin.page';
    protected $folder_name = 'page';
    protected $folder_path;

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = Page::select('pages.id', 'm.title as menu_title', 'pages.title as page_title', 'pages.created_at', 'pages.updated_at', 'pages.status')
            ->leftJoin('menu as m', 'm.id', '=', 'pages.menu_id')
            ->orderBy('pages.id', 'desc')
            ->get();

        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
        $data = [];
        $data['menu'] = Menu::select('id', 'title')->orderBy('title', 'asc')->get();
        return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(PageAddValidation $request)
    {
        if ($request->hasFile('banner')) {

            // check if folder exist
            // if not exist create folder
            parent::checkFolderExist();

            $image = $request->file('banner');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);
        }

       Page::create([
           'menu_id'   => $request->get('menu_id'),
           'title'   => $request->get('title'),
           'slug' => str_slug($request->get('title')),
           'banner'   => isset($image_name)?$image_name:'',
           'description'   => $request->get('description'),
           'status'   => $request->get('status'),
        ]);

        $request->session()->flash('message', 'Page added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        if (!$data['row'] = Page::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        $data['menu'] = Menu::select('id', 'title')->orderBy('title', 'asc')->get();
        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data'));
    }

    public function update(PageEditValidation $request, $id)
    {
        if (!$page = Page::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        if ($request->hasFile('banner')) {

            parent::checkFolderExist();

            if ($page->banner) {
                // remove old image
                if (File::exists($this->folder_path.$page->banner)) {
                    File::delete($this->folder_path.$page->banner);
                }
            }

            $image = $request->file('banner');
            $image_name = rand(4747, 9876).'_'.$image->getClientOriginalName();
            $image->move($this->folder_path, $image_name);

        }

        $page->update([
            'menu_id'   => $request->get('menu_id'),
            'title'   => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'banner' => isset($image_name)?$image_name:$page->banner,
            'description'   => $request->get('description'),
            'status'   => $request->get('status'),
        ]);

        // update page Set menu_id = 1, title = 'title'.....
        // where id = 4;


        $request->session()->flash('message', 'Page updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        if (!$page = Page::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        // remove image before deleting db row
        if ($page->banner) {
            // remove old image
            if (File::exists($this->folder_path.$page->banner)) {
                File::delete($this->folder_path.$page->banner);
            }
        }

        $page->delete();
        $request->session()->flash('message', 'Page deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }



}