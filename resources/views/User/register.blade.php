<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Matrimony | Register</title>
    <link rel="icon" type="image/x-icon" href="/img/web/fevic.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">PP+</h1>

            </div>
            <h3>Register to PP Matrimony</h3>
            <p>Create account to see it in action.</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
            @endif
            <form class="m-t" role="form" action="{{ url('/submitform') }}" method="post">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name (Groom OR Bride)" pattern="[A-Za-z]{1,15}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name (Groom OR Bride)" pattern="[A-Za-z]{1,15}" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                </div>

                <div class="form-group">
                    <select class="form-control" name="year_id" required>
                        <option value="">Select Year of Birth</option>
                        <script>
                            var startYear = 2005;
                            var endYear = 1960;
                            for (var year = startYear; year >= endYear; year--) {
                                document.write('<option value="' + year + '">' + year + '</option>');
                            }
                        </script>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="month_id" id="monthSelect" required>
                        <option value="">Select Month of Birth</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="day_id" id="daySelect" required>
                        <option value="">Select Day of Birth</option>
                    </select>
                </div>

                <script>
                    var monthSelect = document.getElementById("monthSelect");
                    var daySelect = document.getElementById("daySelect");

                    monthSelect.addEventListener("change", updateDays);

                    function updateDays() {
                        var selectedMonth = parseInt(monthSelect.value);
                        var daysInMonth = new Date(new Date().getFullYear(), selectedMonth, 0).getDate();

                        daySelect.innerHTML = '<option value="">Select Day</option>';

                        for (var day = 1; day <= daysInMonth; day++) {
                            daySelect.innerHTML += '<option value="' + day + '">' + day + '</option>';
                        }
                    }
                </script>

                <div class="form-group">
                    <select class="form-control" name="religion_id" required>
                        <option value="">Select Religion</option>
                        @foreach ($religion as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="marriage_status_id" required>
                        <option value="">Select Marriage Status</option>
                        @foreach ($marriage_status as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="countries_id" required>
                        <option value="101">India</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="states_id" required>
                        <option value="">Select State</option>
                        @foreach ($states as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
<!--
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                -->

                <div class="form-group">
                    <div class="checkbox i-checks">
                        <label> <input type="checkbox" required checked="true"><a href="{{ url('/term_condition') }}" target="_blank"> Agree the terms and policy </a></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
            </form>
            <p class="m-t"> <small>Perfect Place Transforming Brands for the Digital Age <br> &copy; 2023-24</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="https://kit.fontawesome.com/36366bcda2.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('#mobile').on('input', function() {
                var mobileNumber = $(this).val().trim();
                var isValid = /^[6-9]\d{9}$/.test(mobileNumber);

                if (!isValid) {
                    $(this).get(0).setCustomValidity('Mobile number must be exactly 10 digits and not start with 0');
                } else {
                    $(this).get(0).setCustomValidity('');
                }
            });
        });

        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            dateFormat: "dd/mm/yy"
        });
    </script>


</body>

</html>