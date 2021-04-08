<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digilims | Login</title>
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

   body{

    /*background: url(assets/images/admin-bg.png);*/       
     background: url(assets/images/loginbg.jpg);
    

    background-size: cover;

    background-position: center;

    background-repeat: no-repeat;
    padding: 3rem 1rem;
    height: 100%;

}

    .col-12.col-md-4.mx-auto.mb-lg-0 {
        background: #fff;
        padding: 15px 30px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, .2);
        border-radius: 5px;
    }

    button.btn.btn-primary.shadow.px-5 {
    width: 100%;
    background: #20bcd5;
    /* outline: none; */
    text-transform: uppercase;
    font-weight: bold !IMPORTANT;
    border-radius: 8px !important;
}
.col-12.col-md-5.mx-auto.mb-lg-0 {
    background: #fff;
    padding: 30px;
    box-shadow: 0px 10px 20px rgba(0,0,0,.2);
    border-radius: 10px;
    width: 500px !important;
    max-width: 500px !important;
}
#loginForm input {
    padding: .375rem .75rem;
    border-radius: 0 !important;
}
.logn-text {
    color: #000 !important;
    font-size: 25px !IMPORTANT;
    font-weight: 500 !important;
    font-family: inherit !important;
    letter-spacing: initial;
    margin-bottom: 0 !important;
    padding: 0;

    text-transform: capitalize !important;
}
.foget-button {
    color: #3377e8 !important;
    margin-bottom: 10px;
}
a.btn.px-5.float-right.foget-button:hover {
    color: #3377e8 !important;
}
    </style>
</head>

<body>
    <div class="page-holder d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 mx-auto  mb-lg-0">
                    <img src="<?= BASEURL ?>assets/images/logo.png" style="width:200px;display:block;margin:0 auto 15px ">
                      <h1 class="text-base text-primary text-uppercase mb-4 logn-text">Login To Account</h1>
            <p>Please enter your email and password to continue</p>
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
                                <label for="validationCustom08">Email</label>
                                <input type="text" id="email" name="email" placeholder="Email Address"
                                    class="form-control border-0 shadow form-control-lg">
                            </div>
                            <div class="form-group mb-4">
                                 <label for="validationCustom08">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="form-control border-0 shadow form-control-lg text-violet">
                            </div>
                             <a href="<?=base_url('provider-forget-password')?>" 

                                    class="btn  px-5 float-right foget-button">Forgot Password?</a>
                            <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
                           <!--  <a href="Provider-User-Login"
                                    class="btn btn-warning shadow px-5 float-right">Provider User Login?</a> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="page-holder d-flex align-items-center">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
                    <div class="pr-lg-5"><img
                            src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/img/illustration.svg" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-lg-5 px-lg-4">
                    <h1 class="text-base text-primary text-uppercase mb-4">Traning Provider Manegment</h1>
                    <h2 class="mb-4">Welcome back!</h2>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore.</p>
                    <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <?php 
                        if (validation_errors()) {
                           echo "<div class='alert alert-danger'>".validation_errors()."</div>";
                        }

                     ?>
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
                    </form>
                </div>
            </div>
        </div>
    </div> -->
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
