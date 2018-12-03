<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                             </span> <span class="text-muted text-xs block">{{Auth::user()->title}} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{url('/instructor/profile')}}">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    STM
                </div>
            </li>
            <li class="active">
                <a href="{{url('/instructor')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
            </li>
            <li>
                <a href="{{url('/instructor/sessions')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Manage OM</span></a>
            </li>
            <!--
            <li>
                <a href="{{url('/instructor/om')}}"><i class="fa fa-laptop"></i> <span class="nav-label">Manage OM</span></a>
            </li>
            <li>
                <a href="{{url('/instructor/invoice')}}"><i class="fa fa-laptop"></i> <span class="nav-label">Upload invoices</span></a>
            </li>-->
            <li>
            <!--  <a href="{{url('/instructor/pdc')}}"><i class="fa fa-sort-amount-asc"></i> <span class="nav-label">Pdc Request</span></a>
               <a href="{{url('/instructor/trips')}}"><i class="fa fa-rocket"></i> <span class="nav-label">Mange Trips</span></a>-->
            </li>
        </ul>

    </div>
</nav>
