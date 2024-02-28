<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

   //Get Users Posts 
    public function postUser($id)
    {
        $userInfo = $this->user::with('posts')->find($id);
        return view('user.profile' , compact('userInfo'));
    }

    //Get User Comments
    public function commentUser($id)
    {
     $userInfo = $this->user::with('comments')->find($id);
     return view('user.profile' , compact('userInfo'));
    }
  
    public function index()
    {
       return view('admin.users.index' , 
       ['users' => $this->user::with('role')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);

        $password = Hash::make($request->password);
        $role     = $request->role_id;

        $user = $this->user;

        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->password   = $password;
        $user->role_id = $role;

        $user->save();

        return back()->with('success' , 'تمت اضافة مستخدم جديد');
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
          $user = $this->user::find($id);
          return view('admin.users.edit' , compact('user'));
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
        $this->validate($request , [
            'name'     => 'required',
            'email'    => 'required'
          
        ]);

          $user = $this->user::find($id);

          $user->name       = $request->name;
          $user->email      = $request->email;
          $user->role_id    = $request->role_id;

          $user->save();

          return redirect(route('user.index'))->with('success' , 'تم تعديل المستخدم');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = $this->user->find($id);
       $user->delete();
       return back()->with('success' , 'تم حذف المستخدم');

    }
}
