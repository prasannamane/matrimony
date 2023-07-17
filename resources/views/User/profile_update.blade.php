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



                                <form method="post" enctype="multipart/form-data" action="{{ url('/profile_update_save') }}">
                                    @csrf

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10"><input type="text" value="{{ $register->first_name }}" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10"><input type="text" value="{{ $register->last_name }}" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Mobile Number</label>
                                        <div class="col-sm-10"><input type="text" value="{{ $register->mobile }}" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10"><input type="text" value="India" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">State</label>
                                        <div class="col-sm-10"><input type="text" value="{{ $register->state }}" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10 select-flex">
                                            <select name="districts_id" class="district form-control" required>
                                                @if($register->districts_id == 0 )
                                                <option value="" selected="selected">Select District</option>
                                                @endif
                                                @foreach ($district as $item)
                                                @if($register->districts_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-10 select-flex">
                                            <select name="cities_id" class="city form-control" required>

                                                @if($register->cities_id == 0 )
                                                <option value="" selected="selected">Select City</option>
                                                @endif

                                                @foreach ($city as $item)
                                                @if($register->cities_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Address/ Landmark</label>
                                        <div class="col-sm-10"><input placeholder="Write in detail about Address/ Landmark..." type="textarea" value="{{ $register->adddress }}" name="adddress" class="form-control textarea-height" required></div>
                                    </div>


                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Religion</label>
                                        <div class="col-sm-10"><input type="text" value="{{ $register->religion }}" disabled="" class="form-control"></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cast</label>
                                        <div class="col-sm-10 select-flex">
                                            <select name="cast_id" class="cast form-control" required>
                                                @if($register->cast_id == 0 )
                                                <option selected="selected">Select Cast</option>
                                                @endif
                                                @foreach ($cast as $item)
                                                @if($register->cast_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                  



                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Expectations</label>
                                        <div class="col-sm-10"><input placeholder="Write in detail about your expectations..." type="textarea" value="{{ $register->expectations }}" name="expectations" class="form-control textarea-height" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">About Me</label>
                                        <div class="col-sm-10"><input placeholder="Write in detail about candidate information..." type="textarea" value="{{ $register->about_me }}" name="about_me" class="form-control textarea-height" required></div>
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



            $(".cast").select2({
                placeholder: "Select a Cast",
                allowClear: true
            });

            $(".city").select2({
                placeholder: "Select a City",
                allowClear: true
            });

            $(".district").select2({
                placeholder: "Select a District",
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