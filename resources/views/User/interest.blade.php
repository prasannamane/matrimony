@include('User.head')

<body>

    <div id="wrapper">

        @include('User.navbar-default')


        <div id="page-wrapper" class="gray-bg">

            @include('User.search-bar')

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



            <div class="wrapper wrapper-content animated fadeInRight search">
                @if(session('success'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">

                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>

                        </div>
                    </div>
                </div>
                @endif

                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="pagination">
                            {{ $register->links() }}
                        </div>
                    </div>
                </div>

                <div class="row profile-grid">
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
                                    <div class="m-t text-center">
                                        <a href="{{ url('/interest') }}/{{ $item->id }}/{{ $item->password }}" class="btn btn-success" type="button"><i class="fa fa-check"></i> Interest</a>
                                        <a href="{{ url('/detail') }}/{{ $item->id }}/{{ $item->password }}" class="btn btn-outline btn-primary" type="button">More Info</a>
                                        <a href="{{ url('/ignore') }}/{{ $item->id }}/{{ $item->password }}" class="btn btn-danger" type="button">Ignore <i class="fa fa-warning"></i> </a>
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

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <script src="https://kit.fontawesome.com/36366bcda2.js" crossorigin="anonymous"></script>

</body>

</html>