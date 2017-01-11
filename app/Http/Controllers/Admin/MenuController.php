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
use App\Models\Menu;
use App\Models\Page;
use Carbon\Carbon;
use DB, File;
use Illuminate\Http\Request;

class MenuController extends AdminBaseController
{
    protected $base_route = 'admin.menus';
    protected $view_path = 'admin.menu';
    protected $folder_name = 'menu';
    protected $folder_path;
    protected $page = 'Menu';

    public function __construct()
    {
        // parent::__construct();
        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = Menu::select('id', 'title', 'status', 'created_at')->get();
        foreach ($data['rows'] as $key => $menu) {

            if ($menu->pages->count() > 0) {

                $data['rows'][$key]->pages = $menu->pages;

            }

        }

        return view(parent::loadDefaultVars($this->view_path.'.list'), compact('data'));
    }

    public function add(Request $request)
    {
        $data = [];
        $data['pages'] = Page::select('id', 'title')->orderBy('title')->get();
        return view(parent::loadDefaultVars($this->view_path.'.add'), compact('data'));
    }

    public function store(AddMenuValidation $request)
    {

       $menu = Menu::create([
           'title'          => $request->get('title'),
           'key'            => str_slug($request->get('title')),
           'description'   => $request->get('description'),
           'status'         => $request->get('status'),
            //'created_by'    => auth()->user()->id,
        ]);

        // manual insert
        /*if ($request->has('pages')) {

            foreach ($request->get('pages') as $key => $value) {

                DB::table('menu_pages')->insert([
                    'menu_id' => $menu->id,
                    'page_id' => $value,
                ]);

            }

            // $menu->pages()->sync($request->get('pages'));

        }*/

        /*[0 => 19, 1 => 20];*/

        /*[
            19 => [
                'page_order' => 11,
                'status' => 1
            ],
            17 => [
                'page_order' => 22,
                'status' => 2
            ],
        ];*/

        // Eloquent relationship
        if ($request->has('page')) {

            // make an array for sync method
            $sync_data = [];
            foreach ($request->get('page') as $key => $page) {
                $sync_data[$page] = [
                    'page_order' => $request->get('page_order')[$key],
                    'created_at' => Carbon::now(),
                ];
            }

            //dd($sync_data);
            $menu->pages()->sync($sync_data);
            //$menu->pages()->sync($request->get('page'));

        }


        $request->session()->flash('message', $this->page.' added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        if (!$data['row'] = Menu::find($id))
            return redirect()->route('admin.error', ['code' => '500']);


        $page_ids = \DB::table('menu_pages')
            ->select('id', 'page_id', 'page_order')
            ->where('menu_id', $id)
            ->get();

        $pages = [];
        foreach ($page_ids as $key => $page) {
            $pages[$key] = Page::select('id', 'title')
                ->where('id', $page->page_id)
                ->first();

            $pages[$key]->menu_pages_id = $page->id;
            $pages[$key]->page_order = $page->page_order;


        }

        $data['pages'] = Page::select('id', 'title')->orderBy('title')->get();
        $data['menu_page'] = $pages;

        return view(parent::loadDefaultVars($this->view_path.'.edit'), compact('data', 'pages'));
    }

    public function update(EditMenuValidation $request, $id)
    {

        //dd($request->all());

        if (!$row = Menu::find($id))
            return redirect()->route('admin.error', ['code' => '500']);


        $row->update([
            'title'   => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'description'   => $request->get('description'),
            'status'   => $request->get('status'),
        ]);

        // Eloquent relationship
        if ($request->has('page')) {

            // make an array for sync method

            $menu_pages_updated_ids = [];
            $menu_pages_ids = $request->get('menu_pages_id');
            $page_order = $request->get('page_order');
            foreach ($request->get('page') as $key => $page) { // 1st: 0 17 // 2nd: 1  19

                $data = [];
                if (is_array($menu_pages_ids) && array_key_exists($key, $menu_pages_ids)) {

                    // update
                    DB::table('menu_pages')
                        ->where('id', $menu_pages_ids[$key])
                        ->update([
                        'menu_id' => $id, // 13
                        'page_id' => $page, //17
                        'page_order' => $page_order[$key], // 1
                    ]); // 18

                    $menu_pages_updated_ids[] = $menu_pages_ids[$key];


                } else {

                    // insert
                    DB::table('menu_pages')->insert([
                        'menu_id' => $id, // 13
                        'page_id' => $page, //19
                        'page_order' => $page_order[$key], // 12
                    ]);

                    $menu_pages_updated_ids[] = DB::getPdo()->lastInsertId();

                }


            }

            DB::table('menu_pages')
                ->where('menu_id', $id)
                ->whereNotIn('id', $menu_pages_updated_ids)->delete();

        } else {

            if ($row->pages->count() > 0) {
                DB::table('menu_pages')
                    ->where('menu_id', $id)
                    ->delete();
            }
        }

        $request->session()->flash('message', $this->page.' updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        if (!$row = Menu::find($id))
            return redirect()->route('admin.error', ['code' => '500']);

        DB::table('menu_pages')
            ->where('menu_id', $id)
            ->delete();
        $row->delete();
        $request->session()->flash('message', $this->page.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }


    public function getPageRowHtml(Request $request)
    {
        $data = [];
        $data['html'] = view($this->view_path.'.partials.page-row', [
            'pages' => Page::select('id', 'title')->orderBy('title')->get()
        ])->render();

        return response()->json(json_encode($data));
    }



}