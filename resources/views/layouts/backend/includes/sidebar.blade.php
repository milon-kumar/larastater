
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <a href="{{route('app.profile.view')}}">
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="{{$user->getFirstMediaUrl('avater')}}" alt="..." class="img-fluid rounded-circle" style="width: 50px ; height: 50px;"></div>
                <div class="title">
                    <h1 class="h5">{{Auth::user()->name}}</h1>
                    <p>Your Role Is :- {{Auth::user()->role->name}}</p>
                </div>
            </div>
        </a>

        <!-- Sidebar Navidation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="{{Request::is('app/dashboard*')?'active':''}}"><a href="{{route('app.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
            <li class="{{Request::is('app/role*')?'active':''}}"><a href="{{route('app.role.index')}}"> <i class="icon-new-file"></i>Roles </a></li>
            <li class="{{Request::is('app/user*')?'active':''}}"><a href="{{route('app.user.index')}}"> <i class="icon-user"></i>User</a></li>
            <li class="{{Request::is('app/backup*')?'active':''}}"><a href="{{route('app.backups.index')}}"> <i class="icon-cloud"></i>Backup</a></li>
            <li class="{{Request::is('app/page*')?'active':''}}"><a href="{{route('app.Page.index')}}"> <i class="icon-page"></i>Page</a></li>
        </ul>
    </nav>
