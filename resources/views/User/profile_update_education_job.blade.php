<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Update | Matrimony</title>
    <link rel="icon" type="image/x-icon" href="/img/web/fevic.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="profile_update">

    <div id="wrapper">

        @include('User.navbar-default')
        <div id="page-wrapper" class="gray-bg">

            @include('User.search-bar')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profile Update</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Profile</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Profile Update</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


            <div class="wrapper wrapper-content animated fadeInRight">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>All form elements <small>With custom checbox and radion elements.</small></h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">



                                <form method="post" enctype="multipart/form-data" action="{{ url('/profile_update_education_save') }}">
                                    @csrf

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Qualification</label>
                                        <div class="col-sm-10 select-flex">

                                            <select name="qualification_id" class="qualification form-control" required>
                                                @if($register->qualification_id === 0 )
                                                <option value="" selected="selected">Select Complexion</option>
                                                @endif
                                                @foreach ($qualifications as $item)
                                                @if($register->qualification_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Profile</label>
                                        <div class="col-sm-10 select-flex">

                                            <select name="job_profile_id" class="job_profile form-control" required>
                                                @if($register->job_profile_id === 0 )
                                                <option value="" selected="selected">Select Complexion</option>
                                                @endif
                                                @foreach ($job_profile as $item)
                                                @if($register->job_profile_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Job Location</label>
                                        <div class="col-sm-10"><input type="text" pattern="[A-Za-z]{1,20}" placeholder="Enter Job Location" name="job_location" value="{{ $register->job_location }}" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Company Name</label>
                                        <div class="col-sm-10"><input type="text" pattern="[A-Za-z]{1,20}" placeholder="Enter Company Name" name="company_name" value="{{ $register->company_name }}" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Salary (Per Year)</label>
                                        <div class="col-sm-10"><input type="number" placeholder="Enter Salary (Per Year)" name="salary" value="{{ $register->salary }}" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Business</label>
                                        <div class="col-sm-10 select-flex">

                                            <select name="business_id" class="business form-control" required>
                                                @if($register->business_id === 0 )
                                                <option value="" selected="selected">Select Business</option>
                                                @endif
                                                @foreach ($business as $item)
                                                @if($register->business_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Business Erning (Per Year)</label>
                                        <div class="col-sm-10"><input type="number" placeholder="Enter Business Erning (Per Year)" name="erning" value="{{ $register->erning }}" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
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

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <script src="https://kit.fontawesome.com/36366bcda2.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $(".qualification").select2({
                placeholder: "Select a Qualification",
                allowClear: true
            });

            $(".job_profile").select2({
                placeholder: "Select a Job Profile",
                allowClear: true
            });

            $(".business").select2({
                placeholder: "Select a Business",
                allowClear: true
            });




            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });
    </script>
</body>

</html>