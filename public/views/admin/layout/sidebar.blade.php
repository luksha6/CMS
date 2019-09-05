<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            @if(Auth::user()->profile_pic)
            <div class="pull-left image">
                <img src="/public/uploads/profile/{{ Auth::user()->profile_pic }}" class="img-circle" alt="User Image">
            </div>
            @else
            <div class="pull-left image">
                <img src="/public/uploads/profile/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <li class="header">NAVIGACIJA</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/public/admin"><i class="fa fa-home"></i> <span>Pocetna</span></a></li>
            <li class="treeview">
                <a href="/public/admin/posts">
                    <i class="fa fa-files-o"></i>
                    <span>Objave</span>

                </a>
                <ul class="treeview-menu">

                    <li ><a href="/public/admin/posts"><i class="fa fa-file"></i> <span>Sve Objave</span></a></li>
                    <li ><a href="/public/admin/posts/add"><i class="fa fa-plus-circle"></i> <span>Dodaj Objavu</span></a></li>
                    <li ><a href="/public/admin/categories/add"><i class="fa fa-plus-circle"></i> <span>Dodaj Kategoriju</span></a></li>
                    <li ><a href="/public/admin/tags/add"><i class="fa fa-plus-circle"></i> <span>Dodaj Tag</span></a></li>
                </ul>
            </li>
            <li><a href="/public/admin/users"><i class="fa fa-users"></i> <span>Korisnici</span></a></li>
            <li ><a href="/public/admin/theme"><i class="fa fa-paint-brush"></i> <span>Izgled</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>