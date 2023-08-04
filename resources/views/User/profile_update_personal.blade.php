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



                                <form method="post" enctype="multipart/form-data" action="{{ url('/profile_update_personal_save') }}">
                                    @csrf

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Blood Group</label>
                                        <div class="col-sm-10 select-flex">
                                            <select name="blood_group_id" class="blood_group form-control" required>
                                                @if($register->blood_group_id == 0 )
                                                <option value="" selected="selected">Select Blood Group</option>
                                                @endif
                                                @foreach ($blood_group as $item)
                                                @if($register->blood_group_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Complexion</label>
                                        <div class="col-sm-10 select-flex">

                                            <select name="complexion_id" class="complexion form-control" required>
                                                @if($register->complexion_id === 0 )
                                                <option value="" selected="selected">Select Complexion</option>
                                                @endif
                                                @foreach ($complexion as $item)
                                                @if($register->complexion_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Physical Disabilities OR Handicaps</label>
                                        <div class="col-sm-10 select-flex">
                                            <select name="physical_dh_id" class="physical_dh form-control" required>
                                                @if($register->physical_dh_id == 0 )
                                                <option selected="selected">Select Physical Disabilities OR Handicaps</option>
                                                @endif
                                                @foreach ($physical_dh as $item)
                                                @if($register->physical_dh_id == $item->id )
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Enter Height in Feet</label>
                                        <div class="col-sm-10">
                                            <input  type="text" pattern="\b[4-9](\.[1-9])?\b" value="{{ $register->height }}" name="height" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Enter Weight in KG</label>
                                        <div class="col-sm-10"><input min="30" max="200" type="number" value="{{ $register->weight }}" name="weight" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Select Birth Time</label>
                                        <div class="col-sm-10"><input type="time" value="{{ $register->birth_time }}" name="birth_time" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Enter Birth Place</label>
                                        <div class="col-sm-10"><input pattern="[A-Za-z]{1,20}" type="text" value="{{ $register->birth_place }}" name="birth_place" class="form-control" required>
                                        </div>
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

            $(".physical_dh").select2({
                placeholder: "Select a Physical Disabilities OR Handicaps",
                allowClear: true
            });


            $(".complexion").select2({
                placeholder: "Select a Complexion",
                allowClear: true
            });

            $(".blood_group").select2({
                placeholder: "Select a Blood Group",
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