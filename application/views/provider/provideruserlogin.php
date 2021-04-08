<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Khathula Learner Engine | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/admin/cloudfront/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/admin/fontawesome/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/admin/cloudfront/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/admin/cloudfront/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= BASEURL ?>assets/images/logo.png">
    <link href="<?= BASEURL ?>assets/validation/css/screen.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    .error {
        color: red;
    }

    .error_validate p {
        margin-bottom: 0;
    }

    body {
        background: url(assets/images/admin-bg.png);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .col-12.col-md-4.mx-auto.mb-lg-0 {
        background: #fff;
        padding: 15px 30px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, .2);
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="page-holder d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 mx-auto  mb-lg-0">
                    <img src="<?= BASEURL ?>assets/images/logo.png" style="display:block;margin:0 auto 15px ">
                    <h1 class="text-base text-primary text-uppercase mb-4">Welcome !</h1>
                    <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <?php 
                        if (validation_errors()) {
                           echo "<div class='alert alert-danger'>".validation_errors()."</div>";
                        }

                     ?>
                    <div class="login-box" id="login-box">
                        <form id="loginForm" class="mt-4" method="POST">
                            <div class="form-group mb-4">
                                <input type="text" id="email" name="email" placeholder="Username or Email address"
                                    class="form-control border-0 shadow form-control-lg">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="form-control border-0 shadow form-control-lg text-violet">
                            </div>

                            <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
                            <a href="Traningprovider"
                                    class="btn btn-warning shadow px-5 float-right">Provider Login?</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= BASEURL ?>assets/admin/jsdelivr/cookie.min.js"></script>
    <script src="<?= BASEURL ?>assets/admin/cloudfront/js/front.js"></script>
     
    
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
    $(function () {
        $('#loginForm').validate({
            rules:{
                'email':{
                  required: true,
                  email: true,
                },
                'password':{
                  required: true,
                   minlength:5,
                },
            },
            messages:{
                'email':{
                  required: 'Please enter your email',
                  email:"Please valid email id"
                },
                'password':{
                  required: 'Please enter your password',
                  minlength: 'password must be at least 5 characters long',
                },
            }
        });
        $.validator.setDefaults({
            submitHandler: function(form) {
             form.submit();
            }
        });
    });
</script>
