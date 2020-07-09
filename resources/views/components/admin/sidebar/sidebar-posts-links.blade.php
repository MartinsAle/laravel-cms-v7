<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Posts</span>
  </a>
  <div id="collapsePosts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('post.create') }}">Criar</a>
        <a class="collapse-item" href="{{ route('post.index') }}">Ver todos os posts</a>
    </div>
  </div>
</li>