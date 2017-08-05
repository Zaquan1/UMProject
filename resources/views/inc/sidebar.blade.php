<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--
        <li class="header">
        <div class=''>
            <span><h3>{{ Auth::user()->name }}</h3></span>
        </li>
      -->
      <div class="user-panel">

        <div>
          <a href="/dashboard/profile/{{ Auth::user()->name }}" class="dropdown-toggle">
            <br> 
            <p>{{ Auth::user()->name }}</p>
          </a>
        </div>
        
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        @if(Auth::user()->role == "admin")
          <li class="header">ADMIN NAVIGATION</li>  
          <li class="treeview">
            <a href="{{ route('register') }}">
              <i class="fa fa-user-plus"></i>
              <span>Add User</span>
            </a>
          </li>
          <li class="treeview">
            <a href="{{ route('lecturers.index') }}">
              <i class="fa fa-users"></i>
              <span>Lecturers</span>
            </a>
          </li>
          <li class="treeview">
            <a href="{{ route('students.index') }}">
              <i class="fa fa-users"></i>
              <span>Students</span>
            </a>
          </li>
          <li class="header">RELATIONSHIP</li>
          <li class="treeview">
            <a href="{{ route('mentor_mentee.index') }}">
              <i class="fa fa-male"></i><i class="fa fa-male"></i>
              <span>Mentor-Mentee</span>
            </a>
          </li>

        @endif
        @if(Auth::user()->role == "lecturer")
          <li class="header">LECTURER NAVIGATION</li>  
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Mentee</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(count($userRole->getRole()['user']->mm_assignments) > 0)
                @foreach($userRole->getRole()['user']->mm_assignments as $assignment)
                  <li>
                    <a href="{{ route('students.show', $assignment->students->id) }}">
                      <i class="fa fa-circle-o"></i>{{ $assignment->students->name }}
                    </a>
                  </li>
                @endforeach
              @endif
            </ul>
          </li>
        @endif

        @if(Auth::user()->role == "student")
          <li class="header">STUDENT NAVIGATION</li>  
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Mentor</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if(!empty($userRole->getRole()['user']->mm_assignments->lecturer))
                <li>
                  <a href="{{ route('lecturers.show', $data['user']->mm_assignments->lecturers->id) }}">
                    <i class="fa fa-circle-o"></i>{{ $userRole->getRole()['user']->mm_assignments->lecturers->name }}
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif
        <!--
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        -->
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>