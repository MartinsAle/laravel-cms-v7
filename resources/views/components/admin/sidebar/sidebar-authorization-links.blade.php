<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Authorizations</span>
  </a>
  <div id="collapseAuthorization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('role.index') }}">Roles</a>
        <a class="collapse-item" href="{{ route('permission.index') }}">Permissions</a>
    </div>
  </div>
</li>