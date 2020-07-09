<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(4);
        return view('admin.authorizations.permissions.index', compact('permissions'));
    }

    public function store(Permission $permission)
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
        $permission->create($data);
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.authorizations.permissions.edit', ['permission' => $permission, 'permissions' => Permission::paginate(4)]);
    }

    public function update(Permission $permission)
    {
        $permission->name = Str::ucfirst(Str::lower(request('name')));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($permission->isDirty('name')) {
            $permission->save();
            session()->flash('permission-update-message', 'Permission has been updated.');
        } else {
            session()->flash('permission-update-message', 'Nothing was updated.');
        }
        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('permission-delete-message', 'Permission has been deleted.');
        return back();
    }
}
