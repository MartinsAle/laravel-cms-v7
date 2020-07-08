<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Users</h1>
        @if (session('user-delete-message'))
            <p class="alert alert-info">{{session('user-delete-message')}}</p>    
        @endif
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="usersDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td><img src="{{$user->avatar}}" class="img-profile rounded-circle" width="60" alt=""></td>
                          <td><a href="{{ route('user.profile.show', $user->id) }}">{{$user->name}}</a></td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at->diffForHumans()}}</td>
                          <td>{{$user->updated_at->diffForHumans()}}</td>
                          <td>
                              {{-- @can('view', $post) --}}
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
                    {{$users->links()}}
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
    @endsection
</x-admin-master>