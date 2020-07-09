<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-3">
                <h1 class="h3 mb-4 text-gray-800">Edit Role</h1>
                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="ex: Subscriber">
                        @error('name')<small class="invalid-feedback">{{$message}}</small>@enderror 
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            @if ($permissions->isNotEmpty())
                <div class="col-sm-9">
                    @if (session()->has('role-delete-message'))
                        <p class="alert alert-info mb-3">{{session('role-delete-message')}}</p>
                        @elseif(session()->has('role-update-message'))    
                        <p class="alert alert-info mb-3">{{session('role-update-message')}}</p>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Options</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="2">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                    <td><input type="checkbox"
                                        @foreach ($role->permissions as $role_permission)
                                            @if ($role_permission->slug == $permission->slug)
                                                checked
                                            @endif
                                        @endforeach
                                        ></td>
                                    <td>{{$permission->id}}</td>
                                    <td><a href="">{{$permission->name}}</a></td>
                                    <td>{{$permission->slug}}</td>
                                    <td>{{$permission->created_at->diffForHumans()}}</td>
                                    <td>{{$permission->updated_at->diffForHumans()}}</td>
                                    <td>
                                            <form action="{{route('role.permission.attach', $role->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                <input type="submit" value="Attach" class="btn btn-primary"
                                                    @if ($role->permissions->contains($permission))
                                                        disabled
                                                    @endif
                                                >
                                            </form>
                                    </td>      
                                    <td>
                                            <form action="{{route('role.permission.detach', $role->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                <input type="submit" value="Detach" class="btn btn-danger"
                                                    @if (!$role->permissions->contains($permission))
                                                        disabled
                                                    @endif
                                                >
                                            </form>
                                    </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            </table>
                            <div class="d-flex">
                            <div class="mx-auto">
                                {{$permissions->links()}}
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
</x-admin-master>