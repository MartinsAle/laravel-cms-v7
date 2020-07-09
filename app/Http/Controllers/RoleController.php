<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(4);
        return view('admin.authorizations.roles.index', compact('roles'));
    }

    public function store(Role $role)
    {
        request()->validate(
            [
                'name' => 'required'
            ]
        );
        $data = [
            'name' => Str::ucfirst(Str::lower(request('name'))),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ];
        $role->create($data);
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.authorizations.roles.edit', ['role' => $role, 'permissions' => Permission::paginate(4)]);
    }

    public function update(Role $role)
    {
        $role->name = Str::ucfirst(Str::lower(request('name')));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($role->isDirty('name')) {
            $role->save();
            session()->flash('role-update-message', 'Role has been updated.');
        } else {
            session()->flash('role-update-message', 'Nothing was updated.');
        }
        return back();
    }

    public function permissionAttach(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function permissionDetach(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-delete-message', 'Role has been deleted.');
        return back();
    }
}
