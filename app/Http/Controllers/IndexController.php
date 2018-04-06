<?php

namespace App\Http\Controllers;


use App\Brand;
use App\Category;
use App\Good;
use App\Goodcat;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        //
        $menCats = Category::where('name', 'men')->first()->goodcat()->take(6)->get();

        $womenCats = Category::where('name', 'women')->first()->goodcat()->take(6)->get();


        return view('index')->with(['menCats'=>$menCats , 'womenCats'=>$womenCats, 'banners'=>$this->banners_rep(), 'menus'=>$this->menus_rep(), 'brands'=>$this->brands_rep()]);
    }


    public function store($categ, $alias=false, $brand=false){
        //
        $cat = Category::where('name', $categ)->first();
        $goodcats = $cat->goodcat()->get();
        $goods = $cat->goods()->get();


//        if($brand){
//
//            if ($alias == 0){
//                $brand = Brand::where('name', $brand)->first();
//                $goods = $cat->goods()->where('brand_id', $brand->id)->get();
//
//                return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'goods'=>$goods]);
//            }
//            elseif($alias){
//                dump($alias);
//            }
//        }
//        if($alias){
//            if($brand){
//                dump($brand);
//            }
//            else {
//                $goodcat = $cat->goodcat()->where('alias', $alias)->first();
//                $goods = $goodcat->goods()->where('category_id', $cat->id)->get();
//
//                return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'alias'=>$alias, 'goods'=>$goods]);
//            }
//        }


        if ($alias && $brand){
            $goodcat = Goodcat::where('alias', $alias)->first();
            $brand = Brand::where('name', $brand)->first();
            $goods = Good::where(['brand_id'=>$brand->id, 'goodcat_id'=>$goodcat->id, 'category_id'=>$cat->id])->get();

            return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'goods'=>$goods]);
        }
        elseif ($alias == 0 && $brand){
                $brand = Brand::where('name', $brand)->first();
                $goods = $cat->goods()->where('brand_id', $brand->id)->get();

                return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'goods'=>$goods]);
        }
        elseif($alias){
            $goodcat = $cat->goodcat()->where('alias', $alias)->first();
            $goods = $goodcat->goods()->where('category_id', $cat->id)->get();

            return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'alias'=>$alias, 'goods'=>$goods]);
        }



        return view('products')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ, 'goods'=>$goods]);
    }

    public function product($id){
        $good = Good::find($id);
        $categ = $good->categories()->find($good->category_id);
        $goodcats = $categ->goodcat()->get();

        $colors = $good->colors()->get();
        $sizes = $good->sizes()->get();


        return view('product')->with(['menus'=>$this->menus_rep(), 'goodcats'=>$goodcats, 'brands'=>$this->brands_rep(), 'sex'=>$categ->name, 'good'=>$good, 'colors'=>$colors, 'sizes'=>$sizes]);
    }


}
