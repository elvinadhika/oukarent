<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_login.css">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content" id="register_user">
                    <div class="signup-form">
                        <h2 class="form-title">REGISTER</h2>

                        <?php
                            $notif = $this->session->flashdata('notif');
                            if (!empty($notif))
                                echo "<div class='alert alert-danger'>$notif</div>";
                         ?>


                        <form method="post" class="register-form" id="register-form" action="<?php echo base_url(); ?>index.php/home/tambah_user" enctype="multipart/form-data">
                        <!--
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="id_penyewa" id="id_penyewa" placeholder="Your ID"/>
                            </div>
                        -->
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_penyewa" id="nama_penyewa" placeholder="Your Name"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="alamat_penyewa" id="alamat_penyewa" placeholder="Your Address"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-phone"></i></label>
                                <input type="numeric" name="no_hp_penyewa" id="no_hp_penyewa" placeholder="Your Phone Number"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_penyewa" id="email_penyewa" placeholder="Your Email"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username_penyewa" id="username_penyewa" placeholder="Username"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_penyewa" id="password_penyewa" placeholder="Your password"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-file"></i></label>
                                <input type="file" name="foto" id="foto"/>
                            </div>

                        <!--
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                        -->
                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">    

                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url(); ?>assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url(); ?>index.php/home/login_user" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

    <!-- JS -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main_login.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>