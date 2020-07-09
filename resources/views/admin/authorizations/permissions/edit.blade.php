<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-3">
                <h1 class="h3 mb-4 text-gray-800">Edit Permission</h1>
                <form action="{{ route('permission.update', $permission->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="ex: Subscriber">
                        @error('name')<small class="invalid-feedback">{{$message}}</small>@enderror 
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-sm-9">
                @if (session()->has('role-delete-message'))
                    <p class="alert alert-info mb-3">{{session('permission-delete-message')}}</p>
                    @elseif(session()->has('permission-update-message'))    
                    <p class="alert alert-info mb-3">{{session('permission-update-message')}}</p>
                @endif
                <div class="card shadow mb-4">
                    {{-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                    <td>{{$permission->id}}</td>
                                    <td><a href="{{ route('permission.edit', $permission->id) }}">{{$permission->name}}</a></td>
                                    <td>{{$permission->slug}}</td>
                                    <td>{{$permission->created_at->diffForHumans()}}</td>
                                    <td>{{$permission->updated_at->diffForHumans()}}</td>
                                    <td>
                                        {{-- @can('view', $post) | can está relacionado com a policy PostPolicy; verifica a permissão --}}
                                            <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                        {{-- @endcan --}}
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
        </div>
    @endsection
</x-admin-master>