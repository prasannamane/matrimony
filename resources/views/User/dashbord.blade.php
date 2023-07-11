    @include('User.head')

    <body>

        <div id="wrapper">

        @include('User.navbar-default')


            <div id="page-wrapper" class="gray-bg">

                <div class="row border-bottom">
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
                                <a href="{{ url('/profile_update') }}"><i class="fa fa-edit"></i> <span class="nav-label">Profile Update</span></a>
                            </li>
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
                                <a href="/logout">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Profile grid</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>Profile</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Profile grid</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>



                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="matrimony ibox-content m-b-sm border-bottom">
                        <div class="matrimony search-form">
                            <form action="/dashbord" method="post" class="row m-serch">
                                @csrf

                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 search-input">
                                    <div class="form-group">
                                        <label class="col-form-label" for="product_name">From Age</label>
                                        <input type="number" value="{{ $from_age }}" name="from_age" placeholder="From Age" class="form-control" min="18" max="59">
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 search-input">
                                    <div class="form-group">
                                        <label class="col-form-label" for="product_name">To Age</label>
                                        <input type="number" value="{{ $to_age }}" name="to_age" placeholder="To Age" class="form-control" min="19" max="60">
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 search-input">
                                    <div class="form-group">
                                        <label class="col-form-label" for="product_name">Religion</label>
                                        <select class="form-control" name="religion_id" required>
                                            @foreach ($religion as $item)
                                            @if($religion_select == $item->id )
                                            <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                            @endif
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 search-input">
                                    <div class="form-group">
                                        <label class="col-form-label" for="product_name">State</label>
                                        <select class="form-control" name="states_id" required>
                                            @foreach ($state as $item)
                                            @if($state_select == $item->id )
                                            <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                            @endif
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 search-input">
                                    <label class="col-form-label" for="product_name">Action</label>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-w-m btn-success">Search</button>
                                    </div>
                                </div>
                                <form>
                        </div>
                    </div>


                    <div class="ibox-content m-b-sm border-bottom">
                        <div class="row">
                            <div class="pagination">
                                {{ $register->links() }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($register as $item)


                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">

                                    <div class="product-imitation">
                                        <img src="{{ url('/img/profile') }}/{{ $item->image }}">
                                    </div>
                                    <div class="product-desc">
                                        <span class="product-price">
                                            #{{ $item->id }}
                                        </span>

                                        <a href="{{ url('/detail') }}/{{ $item->id }}/{{ $item->password }}" class="product-name">{{ $item->first_name }} {{ substr($item->last_name, 0, 1) }}
                                            @if($item->verify == 1)
                                            <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i></button>
                                            @endif
                                        </a>
                                        <small class="text-muted">Age: {{ $item->age }}</small>
                                        <div class="small m-t-xs">
                                            Religion: {{ $item->religion }}<br>
                                            Cast: {{ $item->cast }}<br>
                                            Country: India <br>
                                            State: {{ $item->state }}<br>
                                            Marriage Status: {{ $item->marriage_status }}
                                        </div>
                                        <div class="m-t text-righ">

                                            <a href="{{ url('/detail') }}/{{ $item->id }}/{{ $item->password }}" class="btn btn-xs btn-outline btn-primary">More Info <i class="fa fa-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="footer">
                    <div class="float-right">
                        Have a <strong>Good</strong> Match.
                    </div>
                    <div>
                        <strong>Copyright</strong> Perfect Place Company &copy; 2013-2024
                    </div>
                </div>

            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <script src="https://kit.fontawesome.com/36366bcda2.js" crossorigin="anonymous"></script>

    </body>

    </html>