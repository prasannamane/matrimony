<div class="row border-bottom search-bar">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>

        <ul class="nav navbar-top-links navbar-right">


            <li class="display-nav">
                <a href="{{ url('/dashbord') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Profile Grid</span></a>
            </li>

        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="display-nav">
                <a href="{{ url('/profile_update') }}"><i class="fa fa-edit"></i> <span class="nav-label">Profile Update</span></a>
            </li>

        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="display-nav">
                <a href="{{ url('/profile_update_photo') }}"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Photo</span></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">

            <li class="display-nav">
                <a href="{{ url('/profile_update_personal') }}"><i class="fa fa-user-o"></i> <span class="nav-label">Personal</span></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="display-nav">
                <a href="{{ url('/profile_update_family') }}"><i class="fa fa-group"></i> <span class="nav-label">Family</span></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="display-nav">
                <a href="{{ url('/profile_update_education') }}"><i class="fa fa-book"></i> <span class="nav-label">Education & Job</span></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">

        <li class="display-nav">
                <a href="{{ url('/profile_update_deactivate') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Deactivate</span></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <!--<li>
                                <a href="{{ url('/dashbord') }}"><i class="fa fa-th-large"></i> Profile Grid</a>
                            </li>
                           
                            <li>
                                <a href="{{ url('/profile_update_photo') }}"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Profile Photo</span></a>
                            </li>-->
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to Perfect Place+ Matrimony Dashbord.</span>
            </li>
            <!--
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        -->
            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>