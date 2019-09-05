<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            @if(Auth::user()->profile_pic)
                <div class="pull-left image">
                    <img src="{{url('/uploads/profile')}}/{{ Auth::user()->profile_pic }}" class="img-circle"
                         alt="User Image">
                </div>
            @else
                <div class="pull-left image">
                    <img src="{{url('/uploads/profile/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
            @endif
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                @if(Auth::user()->role == 'admin')
                    <i class="fa fa-circle text-danger"></i><span> Administrator</span>
                @elseif(Auth::user()->role == 'moderator')
                    <i class="fa fa-circle text-warning"></i><span> Moderator</span>
                @else
                    <i class="fa fa-circle text-success"></i><span> Korisnik</span>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{url('/')}}"><i class="fa fa-home"></i> <span>Portal</span></a>
            </li>
            <li class="header">NAVIGACIJA</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{Request::is('admin') ? 'active' : '' }}">
                <a href="{{url('/admin')}}"><i class="fa fa-hashtag"></i> <span>Početna</span></a>
            </li>
            <li></li>
            <li class="treeview {{Request::segment(2) === 'posts' ? 'active' : '' }}">
                <a href="{{url('/admin/posts')}}">
                    <i class="fa fa-files-o"></i>
                    <span>Objave</span>

                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/posts') ? 'active' : '' }}">
                        <a href="{{url('/admin/posts')}}"><i class="fa fa-file"></i> <span>Sve Objave</span></a>
                    </li>
                    <li class="{{ Request::is('admin/posts/add') ? 'active' : '' }}">
                        <a href="{{url('/admin/posts/add')}}"><i class="fa fa-plus-circle"></i> <span>Dodaj objavu</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/categories/add') ? 'active' : '' }}">
                <a href="{{url('/admin/categories/add')}}"><i class="fa fa-plus-circle"></i> <span>Dodaj kategoriju</span></a>
            </li>
            <li class="{{ Request::is('admin/tags/add') ? 'active' : '' }}">
                <a href="{{url('/admin/tags/add')}}"><i class="fa fa-tags"></i> <span>Dodaj oznaku</span></a>
            </li>
            @can('admin-access')
                <li class="{{Request::segment(2) === 'users' ? 'active' : '' }}"><a href="{{url('/admin/users')}}"><i class="fa fa-users"></i> <span>Korisnici</span></a></li>

                <li class="{{Request::segment(2) === 'slider' ? 'active' : '' }}"><a href="{{url('/admin/slider')}}"><i class="fa fa-caret-square-o-right"></i> <span>Slider</span></a></li>

            @endcan

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>