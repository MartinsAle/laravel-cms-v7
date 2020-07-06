<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Editar Post</h1>
        <form action="{{ route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="post_image">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
                <small>Original image:</small>
                <div><img src="{{$post->post_image}}" width="200" alt=""></div>  
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control" name="body" id="body" rows="5">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>