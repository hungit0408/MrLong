 <!DOCTYPE HTML>
<html lang="en">
<head>
<title>ADMIN</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{url('/')}}/public/css/admin/styles.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="{{url('/')}}/public/css/admin/font-awesomee.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->

</head>
<body>
    <style>
    .check-remember{
        float: left;
    font-size: 20px;
    color: white;
    padding-top: 4%;
    }
    .check-forgot
    {
     font-size: 20px;   
    }
</style>
<!-- main -->
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1>Đăng Nhập Quản Trị</h1>
    </div>
    <!--//header-->

    <div class="main-content-agile">
        <div class="sub-main-w3">   
            <div class="wthree-pro">
                <h2>Đăng Nhập Quản Trị</h2>
            </div>
            <form action="#" method="post">
                <div class="pom-agile">
                    <input placeholder="E-mail" name="email" class="user" type="email" required="">
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Password" name="password" class="pass" type="password" required="">
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="form-group check-remember" style="display: block">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember"><span class="custom-control-label">Remember me</span>
                    </label>
                </div>
                @csrf
                <div class="sub-w3l check-forgot ">
                    <h6 class="text-center"><a href="#">Forgot Password?</a></h6>
                    <div class="right-w3l">
                        <input type="submit" value="Login">
                    </div>
                </div>
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sai thong tin dang nhap</strong> 
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{Session::get('success')}}</strong> 
                </div>
                @endif
            </form>
        </div>
    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
        <p>&copy; 2019 Online Login Form. All rights reserved | Design by <a href="http://w3layouts.com">HL</a></p>
    </div>
    <!--//footer-->
</div>
</body>
</html>
    