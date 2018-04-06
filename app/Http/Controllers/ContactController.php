<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    //
    public function index(Request $request){

        if($request->isMethod('post')){
            $input = $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным',
                'email'=>'Поле :attribute должно быть адресом электронной почты'
            ];

            $validator = Validator::make($input,[
                                                    'name'=>'required|max:255',
                                                    'email'=>'required|email|max:255',
                                                    'subject'=>'max:255',
                                                    'message'=>'required',
                                                ], $messages);

            if($validator->fails()){
                return redirect()->route('contact')->withErrors($validator)->withInput();
            }

            $contact = new Contact();
            if($contact->fill($input)->save()){
                return redirect()->route('contact')->with('message', 'В скором времени мы с вами свяжемся');
            }
        }

        return view('contact')->with('menus', $this->menus_rep());
    }
}
