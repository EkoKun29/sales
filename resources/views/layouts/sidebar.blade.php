<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="../../assets/img/logo/AliansyahLogoo.png">
      </div>
      <div class="sidebar-brand-text mx-3">DATA SALES</div>
    </a>
    <hr class="sidebar-divider my-0">
    {{-- <li class="nav-item active">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li> --}}
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('_kontrak-baru') }}" aria-expanded="true"
        aria-controls="collapseForm">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>MSK Kontrak Baru</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-target="#collapseForm" aria-expanded="true"
        aria-controls="collapseForm">
        <i class="fas fa-fw fa-columns"></i>
        <span>MSK Promosi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa fa-arrow-right"></i>
        <span>MSK Repeat</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">MSK REPEAT</h6>
          <a class="collapse-item" href="{{ route('_repeat-order') }}">Repeat Order</a>
          <a class="collapse-item" href="buttons.html">Repeat Kontrak</a>
          <a class="collapse-item" href="buttons.html">Repeat Promosi</a>
        </div>
      </div>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span>
      </a>
      <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tables</h6>
          <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
          <a class="collapse-item" href="datatables.html">DataTables</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ui-colors.html">
        <i class="fas fa-fw fa-palette"></i>
        <span>UI Colors</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Examples
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
        aria-controls="collapsePage">
        <i class="fas fa-fw fa-columns"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Example Pages</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
      </a>
    </li>
    <hr class="sidebar-divider"> --}}
  </ul>