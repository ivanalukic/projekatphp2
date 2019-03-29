<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('/')}}css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('/')}}vendor2/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('/')}}vendor2/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor2/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('/')}}css/theme.css" rel="stylesheet" media="all">

</head>

<body>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{asset('/')}}">
                            <img src="images/icon/logo.png" alt="CoolAdmin">
                        </a>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>

@include('inc.end')
</body>
</html>