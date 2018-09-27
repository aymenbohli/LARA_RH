<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            @role('admin')
            <!-- ADD ROLES AND USERS LINKS -->
            <li><a href="#">La base RH </a></li>
            <li><a href="#">recrutement</a></li>
            <li><a href="#">Les absences</a></li>
            <li><a href="#">Le rapport d'activité</a></li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Users Options</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu menu-open" style="display: block;">
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('permissions.index') }}">permissions</a></li>
                </ul>
            </li>
            @endrole
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>