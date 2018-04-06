<?php

namespace App\Http\Controllers;

use App\Color;
use App\Customer;
use App\Good;
use App\Purchase;
use App\Size;
use Illuminate\Http\Request;
use Session;
use Validator;

class CartController extends Controller
{
    //
    public function index(){

        if(session()->has('goods')){

            $goods = session('goods.item');

            foreach ($goods as &$goodCart){

                $size_id = $goodCart['size_id'];
                $size = Size::find($size_id)->size;

                $goodCart['size'] = $size;
                unset($goodCart['size_id']);

                $color_id = $goodCart['color_id'];
                $color = Color::find($color_id)->name;

                $goodCart['color'] = $color;
                unset($goodCart['color_id']);
            }

//            dd($goods);

//            return session()->flush();
            return view('cart')->with(['menus'=>$this->menus_rep(), 'goodsCart'=>$goods]);
        }

        return view('cart')->with(['menus'=>$this->menus_rep()]);
    }

    public function addCart(Request $request){

        if($request->isMethod('post')){

            $item = [
                    'good_id'=>$request->good_id,
                    'name'=>$request->name,
                    'img'=>$request->img,
                    'price'=>$request->price,
                    'size_id'=>$request->size_id,
                    'color_id'=>$request->color_id,
                    ];

            Session::push('goods.item', $item);

            $qty = $request->session()->get('goods.qty', 0) + 1;

            Session::put('goods.qty', $qty);

            $price = $request->session()->get('goods.price', 0) + $request->price;

            Session::put('goods.price', $price);

//            $request->session()->flush();

//            return $request->session()->all();
            return '$ ' . Session::get('goods.price') . ' (' . Session::get('goods.qty') . ' Товара)';
        }

        return false;
    }

    public function deleteCart(Request $request){

        if(session()->has('goods')){

            $goods = session('goods.item');

            foreach ($goods as $k=>$good){
                if($good['good_id'] == $request->id){

                    $qty = session('goods.qty') - 1;
                    Session::put('goods.qty', $qty);

                    $goodPrice = Good::find($request->id)->price;
                    $price = session('goods.price') - $goodPrice;
                    Session::put('goods.price', $price);

                   session()->forget('goods.item.' . $k);

                   return "{'price': '" . $price ."', 'qty': '" . $qty . "', 'cart':" . "'$ " . Session::get('goods.price') . ' (' . Session::get('goods.qty') . " Товара)'}";
                }
            }
        }

    }

    public function addCustomer(Request $request){

            if ($request->isMethod('post')) {

                $input = $request->except('_token');

                $messages = [
                    'required'=>'Поле :attribute обязательно к заполнению',
                    'email'=>'Поле :attribute должно быть адресом электронной почты',
                    'numeric'=>'Поле :attribute должно быть заполнено номером карты',
                ];

                $validator = Validator::make($input,[
                    'name'=>'required|max:255',
                    'surname'=>'required|max:255',
                    'email'=>'required|email|max:255',
                    'bank_card'=>'required|numeric',
                ], $messages);

                if($validator->fails()){
                    return redirect()->route('purchase')->withErrors($validator)->withInput();
                }
                $input['total_price'] = session('goods.price');

                $customer = new Customer();

                if($customer->fill($input)->save()) {

                    $purchases = session('goods.item');

                    foreach ($purchases as &$purchase){
                        unset($purchase['name']);
                        unset($purchase['img']);

                        $model = new Purchase();

                        $model = $model->fill($purchase);

                        $customer->purchases()->save($model);
                    }

                    session()->flush();

                    return redirect()->route('checkout')->with('status', 'Товар успешно оплачен');
                }
//                dump(session()->all());

            }

            return view('purchase')->with('menus', $this->menus_rep());
    }
}

