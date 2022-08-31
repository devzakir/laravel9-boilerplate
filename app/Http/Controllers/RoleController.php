<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Role\CreateRole;
use App\Actions\Role\UpdateRole;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions = Permission::all();
        // $permission_groups = User::getPermissionGroup();

        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CreateRole::create($request);

        session()->flash('success', 'Role Created!');
        return redirect()->route('roles.index');
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

        return view('role.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        abort_if(!userCan('role.update'), 403);

        try {
            UpdateRole::update($request, $role);

            Toastr::success('success', 'Role Updated!');
            return back();
        } catch (\Throwable $th) {

            Toastr::error('Error', 'Something is wrong');
            return back();
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
        abort_if(!userCan('role.delete'), 403);

        try {
            if (!is_null($role)) {
                $role->delete();
            }

            Toastr::success('success', 'Role Deleted!');
            return back();
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something is wrong');
            return back();
        }
    }
}
