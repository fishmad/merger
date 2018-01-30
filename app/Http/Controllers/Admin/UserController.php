<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'isAdmin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with('users', $users);

        // $user = User::findOrFail($id);
        // $roles = Role::get();

        // return view('admin.users.edit', compact('user', 'roles'));

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return redirect('users');

        $user = User::findOrFail($id);
			
        return view('admin.users.show', compact('user'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('admin.users.edit', compact('user', 'roles'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', ['roles'=>$roles]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('flash_message','User successfully deleted.');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password'));

        $roles = $request['roles'];

        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r);
            }
        }        

        return redirect('admin/users')->with('flash_message','User successfully added.');
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
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'nullable|min:6'
        ]);

        $input = $request->only(['name', 'email', 'password']);
        $newPassword = $request->get('password'); // Check if user has updated thier password
        $roles = $request['roles']; // Check if roles have been changed

        if(empty($newPassword)) { // Password has not changed, leave it the same as before
            $user->update($request->except('password')); // Save all, except the password
        } else {
            $user->fill($input)->save(); // Password has been changed, save all fields except the roles
        }
        
        if (isset($roles)) { // Have the roles been changed?      
            $user->roles()->sync($roles);  // Sync any newley ticked roles[x] as $roles data - update the reference table: role_has_permissions         
        } else {
            $user->roles()->detach(); // Remove any unticked roles[o] references in table: role_has_permissions 
        }

        return redirect('admin/users')->with('flash_message', 'User successfully edited.');







        $input = $request->only(['name', 'email', 'password']);
        $newPassword = $request->get('password');
        $roles = $request['roles'];

        if(empty($newPassword)) {
            $user->update($input->except('password'));
        } else {
            $user->fill($input)->save();
        }
        




    }

}

