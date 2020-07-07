<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Posts</h1>
        @if (session('post-delete-message'))
            <p class="alert alert-info">{{session('post-delete-message')}}</p>
        @elseif(session('post-create-message'))
            <p class="alert alert-success">{{session('post-create-message')}}</p>
        @elseif(session('post-update-message'))
            <p class="alert alert-info">{{session('post-update-message')}}</p>    
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
                      <th>Image</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($posts as $post)
                        <tr>
                          <td>{{$post->id}}</td>
                          <td><img src="{{$post->post_image}}" width="120" alt=""></td>
                          <td>{{$post->user->name}}</td>
                          <td><a href="{{ route('post.edit', $post->id) }}">{{$post->title}}</a></td>
                          <td>{{$post->created_at->diffForHumans()}}</td>
                          <td>{{$post->updated_at->diffForHumans()}}</td>
                          <td>
                              {{-- @can('view', $post) --}}
                                <form action="{{ route('post.destroy', $post->id) }}" method="post">
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
                    {{$posts->links()}}
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