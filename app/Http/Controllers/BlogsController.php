<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Validator;

class BlogsController extends Controller
{
    //
    public function index(){

        return view('blogs')->with(['menus'=>$this->menus_rep(), 'blogs'=>$this->blogs_rep()]);
    }

    public function show($id, Request $request){

        $blog = Blog::where('id', $id)->first();

        $comments = $blog->comments()->get();

        if($request->isMethod('post')){
            $input = $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным',
                'email'=>'Поле :attribute должно быть адресом электронной почты'
            ];

            $validator = Validator::make($input, [
                                            'name'=>'required|max:255',
                                            'email'=>'required|email|max:255',
                                            'text'=>'required',
                                            ],$messages);

            if($validator->fails()){
                return redirect()->route('blog', ['id'=>$id])->withErrors($validator)->withInput();
            }

            $comment = new Comment();
            if($comment->fill($input)->save()){
                return redirect()->route('blog', ['id'=>$id])->with('message', 'Комментарий добавлен');
            }
        }

        return view('blog_single')->with(['menus'=>$this->menus_rep(), 'blog'=>$blog, 'comments'=>$comments]);
    }
}
