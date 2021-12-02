<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        Hola, {{ Auth::user()->rol }} 
        <!-- Este botón se usará para brindar información acerca del tipo de usuario. -->
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
        <i class="fas fa-sign-out-alt"></i>
      </a>
      <form id="logout-form" action="{{ route('logout')}}" method="post" style="display:none">
        @csrf
      </form>
    </li>
  </ul>
</nav>