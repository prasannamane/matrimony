@include('User.head')

<body>

    <div id="wrapper">

        @include('User.navbar-default')

        <div id="page-wrapper" class="gray-bg">

            @include('User.search-bar')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Payment Page</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Payment</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Payment Page</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="ibox product-detail">
                            <div class="ibox-content payment">
                                <p>"Enjoy our services at no cost! Experience hassle-free usage with our maintenance package for just 100 Rupees, covering an entire year."</p>
                                <div>Contacts: 98348 96987</div>
                                <img src="{{ url('/img/upi.png') }}">
                                <h2>9686673567@ybl <br>
                                    9686673567@axl<br><br></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>

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