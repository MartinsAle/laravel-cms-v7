<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Users</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('user.create') }}">Criar</a>
        <a class="collapse-item" href="{{ route('user.index') }}">Ver todos os usuários</a>
    </div>
  </div>
</li>