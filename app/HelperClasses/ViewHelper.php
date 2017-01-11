<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 11/7/2016
 * Time: 7:52 AM
 */

namespace App\HelperClasses;


class ViewHelper
{
    public function getData($key, $data = [])
    {
        if (old($key))
            return old($key);
        elseif (count($data) > 0)
            return $data->$key;
        else
            return '';
    }


    public function getMenuPagesTitleList($pages)
    {
        if ($pages !== '') {

            $titles = '';
            foreach ($pages as $page) {
                $titles = $titles . "<a href='". route('admin.pages.edit', ['id' => $page->id]) ."'>". $page->title . "</a> | ";
            }

            return rtrim($titles, '| ');

        } else {
            return 'No Pages';
        }

    }


    public function checkPageExistOnMenu($page, $pages)
    {
        foreach ($pages as $item) {
            if ($item->id == $page->id) {
                echo 'selected';
                break;
            }
        }
    }

}