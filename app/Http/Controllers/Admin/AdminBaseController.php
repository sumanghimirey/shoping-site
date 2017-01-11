<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use DB, File, View;

class AdminBaseController extends Controller
{

    protected function loadDefaultVars($path)
    {
        View::composer($path, function ($view) {
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path.'.');
            $view->with('trans_path', $this->getTransPath());
        });

        return $path;
    }

    protected function checkFolderExist()
    {
        if (!File::exists($this->folder_path)) {
            // create folder
            File::makeDirectory($this->folder_path);
        }
    }


    protected function getTransPath()
    {
        $view_path_array = explode('.', $this->view_path);
        $trans_path = implode('/', $view_path_array).'/general.';
        return $trans_path;
    }
}