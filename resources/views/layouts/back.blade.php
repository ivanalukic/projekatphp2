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

<body class="animsition">
<script>
    let csrf="{{csrf_token()}}";
</script>
<div class="page-wrapper">
    @include('inc.hamburger2')
    @include('inc.sidebar')
<div class="page-container">
@include('inc.header2')

@yield('content')
@include('inc.end')