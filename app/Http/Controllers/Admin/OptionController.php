<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    //

    public function color(){

        return view('admin.goodsColor')->with(['adminMenu'=>$this->adminMenus_rep(), 'colors'=>$this->color_rep(), 'goods'=>$this->goods_rep()]);
    }

    public function colorEdit(Request $request){

        $input = $request->except('_token');

        $colors = $this->color_rep();

        foreach ($colors as $color){
            if(isset($input[$color->id])){
                $color->saveGoods($input[$color->id]);
            }
            else $color->saveGoods([]);
        }

        return redirect()->route('adminColor')->with('status','Цвет товаров обновлен');
    }

    public function size(){

        return view('admin.goodsSize')->with(['adminMenu'=>$this->adminMenus_rep(), 'sizes'=>$this->size_rep(), 'goods'=>$this->goods_rep()]);
    }

    public function sizeEdit(Request $request){

        $input = $request->except('_token');

        $sizes = $this->size_rep();

        foreach ($sizes as $size){
            if(isset($input[$size->id])){
                $size->saveGoods($input[$size->id]);
            }
            else $size->saveGoods([]);
        }

        return redirect()->route('adminSize')->with('status','Размер товаров обновлен');
    }
}
