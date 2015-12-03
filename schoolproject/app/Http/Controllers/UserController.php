<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::latest()->get();
        return view('userpages.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $userFormRequest)
    {
        $confirmation_code = str_random(30);

        $users = new User;
        $users->firstname             = $userFormRequest->firstname;
        $users->lastname              = $userFormRequest->lastname;
        $users->email                 = $userFormRequest->email;
        $users->username              = $userFormRequest->username;
        $users->password              = $userFormRequest->password;
        $users->confirmation_code     = $confirmation_code;

        Mail::send('email.verify', ['users' => $users, 'confirmation_code' => $confirmation_code ], function ($message) use ($users) {
            $message->from('members@schoolproject.com', 'School Project Member');

            $message->to($users->email, $users->firstname)->subject('Your Reminder!');
        });

        //Flash::message('Thanks for signing up! Please check your email.');

        $users->save();
       // return redirect()->route('index');
        return redirect()->action('UserController@index');
        //return 'test';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('userpages.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $users = User::find($id);
      // $users = User::where('id', $id)->first();
       return view('userpages.edit', compact('users', $users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $userFormRequest, $id)
    {
        $users = User::find($id);
        $users->firstname  = $userFormRequest->firstname;
        $users->lastname   = $userFormRequest->lastname;
        $users->email      = $userFormRequest->email;
        $users->username   = $userFormRequest->username;
        
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id);
        $users = User::find($id)->delete();
        return redirect()->action('UserController@index');
    }
}
