<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();

        return view('admin.blogs')->with(['adminMenu' => $this->adminMenus_rep(), 'blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogsCreateChange')->with(['adminMenu' => $this->adminMenus_rep()]);
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
            'image'=>'Фаил не является картинкой',
        ];

        $validator = Validator::make($input,[
            'title'=>'required|max:100',
            'desc'=>'required',
            'text'=>'required',
            'image'=>'image',
        ],$messages);


        if($validator->fails()){
            return redirect('admin/blogs/create')->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/images', $input['image']);
        }

        $blog = new Blog();
        $blog->fill($input);
        if($blog->save()){
            return redirect('admin/blogs')->with('status', 'Статья добавлена');
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
        $blog = Blog::find($id);
        return view('admin.blogsCreateChange')->with(['adminMenu' => $this->adminMenus_rep(), 'blog'=>$blog]);
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
        ];

        $validator = Validator::make($input,[
            'title'=>'required|max:100',
            'desc'=>'required',
            'text'=>'required',
        ],$messages);


        if($validator->fails()){
            return redirect()->route('blogs.edit', ['id'=>$id])->withErrors($validator);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/images', $input['image']);
        }
        else $input['image'] = $input['old_image'];
        unset($input['old_image']);

        $blog = Blog::find($id);
        $blog->fill($input);
        if($blog->update()){
            return redirect()->route('blogs.edit', ['id'=>$id])->with('status', 'Статья изменена');
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
        $blog = Blog::find($id);

        $blog->comments()->delete();

        if($blog->delete()){
            return redirect()->route('blogs.index')->with('status', 'Материал удален');
        }
    }
}
