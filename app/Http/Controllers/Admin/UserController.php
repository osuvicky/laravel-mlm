<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role',compact('user','roles','permissions'));
    }

    public function  assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('warning', 'Role exists');
        }
        $user->assignRole($request->role);
            return back()->with('success', 'Role added');
    }

    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('warning', 'Role removed');
        }
        return back()->with('warning', 'Role does not exists');
    }

    public function  givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('warning', 'Permission exists');
        }
        $user->givePermissionTo($request->permission);
            return back()->with('success', 'Permission added');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('warning', 'Permission revoked');
        }
        return back()->with('warning', 'Permission does not exists');
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('warning', 'You are admin.');
        }
        $user->delete();
            return back()->with('success', 'User Deleted!');
    }
    
}
