<?php

namespace App\Http\Controllers\Admin;

use App\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $goods = Good::all();

        return view('admin.goods')->with(['adminMenu' => $this->adminMenus_rep(), 'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.goodCreateChange')->with(['adminMenu' => $this->adminMenus_rep(), 'brands'=>$this->brands_rep(), 'goodcats'=>$this->goodcat_rep(), 'categorys'=>$this->category_rep()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');
        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'numeric'=>'Поле :attribute должно быть числом',
            'image'=>'Фаил не является картинкой',
        ];

        $validator = Validator::make($input,[
                                            'name'=>'required|unique:goods,name|max:100',
                                            'price'=>'required|numeric',
                                            'brand_id'=>'required',
                                            'goodcat_id'=>'required',
                                            'category_id'=>'required',
                                            'desc'=>'required|max:200',
                                            'text'=>'required',
                                            'image'=>'image',
                                            ],$messages);


        if($validator->fails()){
            return redirect('admin/goods/create')->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/images', $input['image']);
        }

        $good = new Good();
        $good->fill($input);
        if($good->save()){
            return redirect('admin/goods')->with('status', 'Товар добавлен');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $good = Good::find($id);

        return view('admin.goodCreateChange')->with(['adminMenu' => $this->adminMenus_rep(), 'brands'=>$this->brands_rep(), 'goodcats'=>$this->goodcat_rep(), 'categorys'=>$this->category_rep(), 'good'=>$good]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->except('_token', '_method');

        if(empty($input)){
            return redirect('admin')->with('error', 'Нет данных');
        }

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'numeric'=>'Поле :attribute должно быть числом',
            'image'=>'Фаил не является картинкой',
        ];

        $validator = Validator::make($input,[
            'name'=>'required|max:100',
            'price'=>'required|numeric',
            'brand_id'=>'required',
            'goodcat_id'=>'required',
            'category_id'=>'required',
            'desc'=>'required|max:200',
            'text'=>'required',
        ],$messages);


        if($validator->fails()){
            return redirect()->route('goods.edit', ['id'=>$id])->withErrors($validator);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/images', $input['image']);
        }
        else $input['image'] = $input['old_image'];
        unset($input['old_image']);

        $good = Good::find($id);
        $good->fill($input);
        if($good->update()){
            return redirect()->route('goods.edit', ['id'=>$id])->with('status', 'Товар изменен');
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $good = Good::find($id);
        if($good->delete()){
            return redirect()->route('goods.index')->with('status', 'Материал удален');
        }
    }
}
