<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Brand;
use App\Category;
use App\Color;
use App\Good;
use App\Goodcat;
use App\Menu;
use App\Size;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function menus_rep(){
        return Menu::all();
    }

    protected function goodcat_rep(){
        return Goodcat::all();
    }

    protected function goods_rep(){
        return Good::all();
    }

    protected function color_rep(){
        return Color::all();
    }

    protected function size_rep(){
        return Size::all();
    }

    protected function category_rep(){
        return Category::all();
    }

    protected function brands_rep(){
        return Brand::all();
    }

    protected function blogs_rep(){
        return Blog::all();
    }

    protected function banners_rep(){
        return Banner::all();
    }

    protected function users_rep(){
        return User::all();
    }

        protected function adminMenus_rep(){
        return [
                ['title'=>'Характеристики', 'path'=>'#', 'arr'=>[
                    ['title'=>'Цвет', 'path'=>'http://shop.loc/admin/color'],
                    ['title'=>'Размер', 'path'=>'http://shop.loc/admin/size'],
                ],
                ],
                ['title'=>'Товары', 'path'=>'http://shop.loc/admin/goods'],
                ['title'=>'Блоги', 'path'=>'http://shop.loc/admin/blogs'],
                ['title'=>'Администраторы', 'path'=>'http://shop.loc/admin/users'],
                ];
    }

}
