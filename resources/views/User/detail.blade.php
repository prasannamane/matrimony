@include('User.head')

<body>

    <div id="wrapper">

        @include('User.navbar-default')

        <div id="page-wrapper" class="gray-bg">

            @include('User.search-bar')

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