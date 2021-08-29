<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/user_signup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user/user_home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signupstore(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'useremail'=>'required|unique:users,email',
            'userpassword'=>'required'
         ]);
          $result= new User();
            $result->name = $request['username'];
            $result->email = $request['useremail'];
           $result->password = bcrypt($request['userpassword']);
          $result->save();
          $request->session()->flash('msg','signup sucessfully go to signIn');
         return redirect('user/signup');


        }
        //end signup user
            //userLogin functions

         public function usercreate()
         {
             return view('user/user_login');
         }
         public function userstore(Request $request)
         {
            $this->validate($request,[

                'useremail'=>'required|email',
                'userpassword'=>'required'
             ]);

            $email=$request['useremail'];
            $password=$request['userpassword'];

          $result=User::where('email',$email)->first();

          if(!is_null($result))
            {
                if(!$result->status)
              {

                return redirect('user/login')->with('error','You are blocked from admin site');
              }
            if(Hash::check($request->userpassword,$result->password))
            {
                $request->session()->put('user',$result);
                return redirect('user/');
            }
            else
            {
                return redirect('user/login')->with('warning','please give the valid address');
            }




        }

        $request->session()->flash('msg','please give the valid address');
         return redirect('user/login');


         }

    /**
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
    }
}
