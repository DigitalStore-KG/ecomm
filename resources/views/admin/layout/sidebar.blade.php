{{-- sidebar start --}}
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Category Manager <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('create.category')}}">Create</a></li>
            <li><a href="{{route('list.category')}}">List</a></li>
            
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Product Manager <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('create.product')}}">Create</a></li>
            <li><a href="{{route('list.product')}}">List</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> User Manager <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="">Create User</a></li>
            <li><a href="">User List</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> Product Booking Manager <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="">Booking List</a></li>
            <li><a href="">Create User</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="tables.html">Tables</a></li>
            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="chartjs.html">Chart JS</a></li>
            <li><a href="chartjs2.html">Chart JS2</a></li>
            <li><a href="morisjs.html">Moris JS</a></li>
            <li><a href="echarts.html">ECharts</a></li>
            <li><a href="other_charts.html">Other Charts</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
            <li><a href="fixed_footer.html">Fixed Footer</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="menu_section">
      <h3>Live On</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="e_commerce.html">E-commerce</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="project_detail.html">Project Detail</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="profile.html">Profile</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="page_403.html">403 Error</a></li>
            <li><a href="page_404.html">404 Error</a></li>
            <li><a href="page_500.html">500 Error</a></li>
            <li><a href="plain_page.html">Plain Page</a></li>
            <li><a href="login.html">Login Page</a></li>
            <li><a href="pricing_tables.html">Pricing Tables</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="#level1_1">Level One</a>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
              <li><a href="#level1_2">Level One</a>
              </li>
          </ul>
        </li>                  
        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
      </ul>
    </div>

  </div>
  {{-- sidebar end --}}
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    @if (Auth::user())
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a> 
    @else
      <a data-toggle="tooltip" data-placement="top" title="Login" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
    @endif
  </div>

  {{-- ----------sidebar menu footer end--}}