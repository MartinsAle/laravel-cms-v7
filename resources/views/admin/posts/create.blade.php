<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Novo Post</h1>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label for="post_image">File</label>
              <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control" name="body" id="body" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>