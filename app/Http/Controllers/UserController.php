<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();
        $inactiveUsers = $data->where('status', false)->count();
        $admin = $data->where('is_admin', true)->count();
        $customers = $data->where('is_admin', false)->count();

        $userData = ['customers' => $customers, 'admin' => $admin, 'inactive' => $inactiveUsers];
        $users = User::with('roles')->latest()->paginate(20);

        return view('user.index', compact(['users', 'userData']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        $user->syncRoles($request->roles);

        session()->flash('success', 'User created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        $data = $user->roles()->pluck('id')->toArray();
        return view('user.edit', compact(['user', 'roles', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:80',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'nullable|sometimes|min:6|confirmed',
            'roles' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        $user->syncRoles($request->roles);

        if($request->has('password')){
            $user->update(['password' => bcrypt('password')]);
        }

        session()->flash('success', 'User updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User deleted successfully');
        return back();
    }
}
