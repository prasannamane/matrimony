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

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profile Detail</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Profile</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Profile Detail</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                @foreach ($register as $item)
                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox product-detail">
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-4">


                                        <div class="product-images">

                                            <div>
                                                <div class="image-imitation">
                                                    <img src="{{ url('/img/profile') }}/{{ $item->image }}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="image-imitation">
                                                    [IMAGE 2]
                                                </div>
                                            </div>
                                            <div>
                                                <div class="image-imitation">
                                                    [IMAGE 3]
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <h2 class="font-bold m-b-xs">
                                            {{ $item->first_name }} {{ $item->last_name }}
                                        </h2>

                                        <hr>
                                        <h5>Religion: {{ $item->religion }}</h5>
                                        <h5>Cast: {{ $item->cast }}</h5>
                                        <h5>Marriage Status: {{ $item->marriage_status }}</h5>

                                        <hr>
                                        <h4>Family</h4>
                                        <h5>Father: </h5>
                                        <h5>Father Work/ Job: </h5>
                                        <h5>Father Mobiler Number: </h5>
                                        <h5>Mother: </h5>
                                        <h5>Mother Work/ Job: </h5>
                                        <h5>Mother Mobile Number: </h5>
                                        <h5>Brother: </h5>
                                        <h5>Sister: </h5>

                                        <hr>
                                        <h4>Address</h4>
                                        <h5>Country: India</h5>
                                        <h5>State: {{ $item->state }}</h5>
                                        <h5>District: {{ $item->district }}</h5>
                                        <h5>City: {{ $item->city }}</h5>
                                        <h5>Location: {{ $item->adddress }}</h5>

                                        <hr>
                                        <h4>Contacts</h4>
                                        <div>
                                            <div class="btn-group contact">
                                                <a class="btn btn-primary btn-sm" href="tel:{{ $item->mobile }}"><i class="fa fa-phone"></i> Call Us: {{ $item->mobile }}</a>
                                            </div>
                                            <div class="btn-group contact">
                                                <a class="btn btn-success btn-sm" href="https://wa.me/{{ $item->mobile }}"><i class="fa fa-whatsapp"></i> WhatsApp Us: {{ $item->mobile }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 border-left">

                                        <!-- <small>Many desktop publishing packages and web page editors now.</small> -->
                                        <div class="m-t-md">
                                            <h2 class="product-main-price">Age: {{ $item->age }} <small class="text-muted">{{ $item->dob }} </small> </h2>
                                        </div>

                                        <hr>
                                        <h4>Personal Information</h4>
                                        <h5>Blood Group: </h5>
                                        <h5>Height: </h5>
                                        <h5>Weight: </h5>
                                        <h5>Complexion: </h5>
                                        <h5>Birth Time: </h5>
                                        <h5>Birth Place: </h5>

                                        <hr>
                                        <h4>Education and Job</h4>
                                        <h5>Qualification: </h5>
                                        <h5>Job Profile: </h5>
                                        <h5>Job Location: </h5>
                                        <h5>Salary (Per Year): </h5>
                                        <h5>Business: </h5>
                                        <h5>Business Income (Per Year): </h5>

                                        <hr>
                                        <h5>Expectation: </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="ibox-footer">
                                <span class="float-right">
                                    Have a <strong>Good</strong> Match.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="footer">
                <div class="float-right">
                    <br><a href="tel:9834896987">Call Us: 98348 96987</a>
                    <br><a href="https://wa.me/9834896987">Whatsapp: 98348 96987 </a>
                </div>
                <div>
                    <strong>Copyright</strong> Perfect Place Company &copy; 2013-2024
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ url('/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('/js/popper.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.js') }}"></script>
    <script src="{{ url('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('/js/inspinia.js') }}"></script>
    <script src="{{ url('/js/plugins/pace/pace.min.js') }}"></script>

    <!-- slick carousel-->
    <script src="{{ url('/js/plugins/slick/slick.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/36366bcda2.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {


            $('.product-images').slick({
                dots: true
            });

        });
    </script>

</body>

</html>