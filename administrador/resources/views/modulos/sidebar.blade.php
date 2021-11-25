<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x:hidden">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('/') }}/vistas/images/logo-acopi.png" alt="ACOPI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACOPIsoft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 299px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/vistas/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--===================================================
          =            Sección de botones del menú            =
          ===================================================-->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Página Web
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!--=============================================
            =            Menú página web            =
            =============================================-->
            
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('pagina_web/carrusel') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Carrusel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/noticias') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Noticias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/interesados') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Interesados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/entrevistas') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Entrevistas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/eventos') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Eventos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/footer') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pie de Página</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Información General
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <!--=============================================
                  =            Submenú Información           =
                  =============================================-->
                  
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/gremio') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gremio y directivos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/productos') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Productos y servicios</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/redes') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Redes sociales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/estatutos') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Estatutos y etica</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/contacto') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Información de contacto</p>
                        </a>
                      </li>
                    </ul>
                  
                  <!--=====  End of Submenú Información  ======-->
                  
                </li>
                <li class="nav-item">
                  <a href="{{ substr(url(""),0,-21) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver página web</p>
                  </a>
                </li>
              </ul>
            
            <!--=====  End of Menú página web  ======-->
            
            <!--======================================
            =            Menú Afiliados            =
            ======================================-->
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Afiliados
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('afiliados/agregar') }}" class="nav-link">
                    <i class="nav-icon fas fa-plus-circle"></i>
                    <p>Agregar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('afiliados/consultar') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>Consultar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('afiliados/modificar') }}" class="nav-link">
                    <i class="nav-icon fas fa-pen-square"></i>
                    <p>Modificar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('afiliados/eliminar') }}" class="nav-link">
                    <i class="nav-icon fas fa-trash"></i>
                    <p>Eliminar</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <!--=====  End of Menú Afiliados  ======-->
            
            
            
          </li>

          <!--=====  End of Sección de botones del menú  ======-->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 18.7852%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>