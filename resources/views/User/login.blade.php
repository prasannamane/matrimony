<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Matrimony | Login</title>
    <link rel="icon" type="image/x-icon" href="/web_img/fevic.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">PP+</h1>

            </div>
            <h3>Welcome to Our PP Matrimony Site</h3>
            <p>Finding your perfect life partner is now easier than ever with our matrimonial site.</p>
            <p>Login in. To see it in action.</p>
            @if(session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form class="m-t" role="form" action="/loginform" method="post">
                @csrf

                <div class="form-group">
                    <input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required="">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="/matrimony/register">Create an account</a>
            </form>
            <p class="m-t"> <small>Perfect Place Transforming Brands for the Digital Age <br> &copy; 2023-24</small></p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>