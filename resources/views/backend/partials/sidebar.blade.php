  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/adminlte/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="{{ route('backend.dashboard.list') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>

        <li>
          <a href="{{ route('backend.admins.list') }}">
              <i class="fa fa-share"></i> <span>Admin</span>
          </a>
        </li>

        <li class="treeview menumain">
          <a href="#">
            <i class="fa fa-table"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a class="active"  href="{{ route('backend.products.list') }}"><i class="fa fa-"></i> Product</a></li>
            </ul>
        </li>
     
        
        

 
      
    </section>
    <!-- /.sidebar -->
  </aside>