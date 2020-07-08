<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">User Profile</h1>
        <form action="{{ route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex">
                <div class="mx-auto">
                    <div class="form-group text-center">
                        <img class="img-profile rounded-circle mb-3" src="{{$user->avatar}}" width="120">
                        <input type="file" class="form-control-file" name="avatar" id="avatar"> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{$user->name}}">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email" value="{{$user->email}}">
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="usersDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Options</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($roles as $role)
                        <tr>
                          <td><input type="checkbox"
                                @foreach ($user->roles as $user_role)
                                    @if ($user_role->slug == $role->slug)
                                        checked
                                    @endif
                                @endforeach
                            ></td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                                <form action="{{route('user.role.attach', $user->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <input type="submit" value="Attach" class="btn btn-primary"
                                        @if ($user->roles->contains($role))
                                            disabled
                                        @endif
                                    >
                                </form>
                          </td>      
                          <td>
                                <form action="{{route('user.role.detach', $user->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <input type="submit" value="Detach" class="btn btn-danger"
                                        @if (!$user->roles->contains($role))
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
                    {{$roles->links()}}
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endsection
</x-admin-master>