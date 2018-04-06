<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.users')->with(['adminMenu' => $this->adminMenus_rep(), 'users'=>$this->users_rep()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.userCreateChange')->with(['adminMenu' => $this->adminMenus_rep()]);
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
            'email'=>'Поле :attribute не является адресом электронной почты',
            'unique'=>':attribute уже существует',
        ];

        $validator = Validator::make($input,[
            'name'=>'required|max:100',
            'login'=>'required|unique:users,login',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'password_confirmation'=>'required',
        ],$messages);


        if($validator->fails()){
            return redirect('admin/users/create')->withErrors($validator)->withInput();
        }

        if($input['password'] == $input['password_confirmation']){
            $user = User::create([
                'name'=>$input['name'],
                'login'=>$input['login'],
                'email'=>$input['email'],
                'password'=>bcrypt($input['password'])
            ]);

            if($user->save()){
                return redirect('admin/users')->with('status', 'Администратор добавлен');
            }
        }
        else return redirect('admin/users/create')->withErrors('Пароль не совпадает');


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
        $user = User::find($id);
        return view('admin.userCreateChange')->with(['adminMenu' => $this->adminMenus_rep(), 'user'=>$user]);
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

        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'email'=>'Поле :attribute не является адресом электронной почты',
            'unique'=>':attribute уже существует',
        ];

        $validator = Validator::make($input,[
            'name'=>'required|max:100',
            'login'=>'required|unique:users,login,'.$id,
            'email'=>'required|email|unique:users,email,'.$id,
        ],$messages);


        if($validator->fails()){
            return redirect()->route('users.edit',['id'=>$id])->withErrors($validator);
        }


        if(isset($input['password']) && $input['password'] == $input['password_confirmation']){

            unset($input['old_pass']);
            $input['password'] = bcrypt($input['password']);

            $user = User::find($id);

            if($user->fill($input)->save()){
                return redirect('admin/users')->with('status', 'Данные администратора изменены');
            }
        }
        elseif (empty($input['password'])){

            $input['password'] = $input['old_pass'];
            unset($input['old_pass']);

            $user = User::find($id);

            if($user->fill($input)->save()){
                return redirect('admin/users')->with('status', 'Данные администратора изменены');
            }
        }
        else return redirect()->route('users.edit',['id'=>$id])->withErrors('Пароль не совпадает');
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
        $user = User::find($id);
        if($user->delete()){
            return redirect()->route('users.index')->with('status', 'Администратор удален');
        }
    }
}
