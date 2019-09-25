<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIPNBAPAS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <!--===============================================================================================-->
</head>
<body>


<div class="limiter">

    <div class="container-login100">

        <div class="wrap-login100">

            <div>
            <div class="login100-pic js-tilt">
                <img src="<?php echo base_url()?>assets/images/logo.png" alt="IMG">
            </div>
            </div>
            <form class="login100-form validate-form" method="post" action="<?php echo base_url()?>login">
					<span class="login100-form-title">
						Medical Representative
					</span>
                <?php if($this->session->flashdata('alert') == "gagal"){
                    ?>
                    <p align="center" style="background: #ff734c;color:white;border-radius: 5px">
						Username atau Password Salah
					</p>
                    <?php
                }?>

                <div class="wrap-input100 validate-input" data-validate = "username tidak boleh kosong">
                    <input class="input100" type="text" name="username" placeholder="username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submit" type="submit" value="submit">
                        Login
                    </button>
                </div>

<!--                <div class="text-center p-t-12">-->
<!--						<span class="txt1">-->
<!--							Forgot-->
<!--						</span>-->
<!--                    <a class="txt2" href="#">-->
<!--                        Username / Password?-->
<!--                    </a>-->
<!--                </div>-->

            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/js/main.js"></script>

</body>
</html>