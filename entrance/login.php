<?php
session_start();
require '../class/User.php';

if(isset($_SESSION[User::$keyUserName]) && $_SESSION[User::$keyUserName] != null){
    //direct to home page
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=home.php\">";
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <title>Maid Booking</title>

        <?php require './library/header.php';?>

        <!-- Theme CSS -->
        <link href="../assets/css_fl/freelancer.min.css" rel="stylesheet">

        <link href="../assets/css_fl/font-family-montserrat.css" rel="stylesheet" type="text/css">
        <link href="../assets/css_fl/font-family-lato.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top">Maid Booking System</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#portfolio">Services</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about">About</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Contact</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#login_modal" data-toggle="modal">Sign In</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" src="../assets/img/welcome-maid.jpg" alt="Maid">
                        <div class="intro-text">
                            <span class="name">We Bring Maid To You</span>
                            <hr class="star-light">
                            <span class="skills">Book A Maid -> Maid Arrive -> Get Satisfied</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Portfolio Grid Section -->
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>A little glimpse to our services</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                        <a  class="portfolio-link">
                            <div class="caption">
                                <div class="caption-content">
                                    Full House Cleaning
                                </div>
                            </div>
                            <img src="../assets/img/clean-room.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    Mirror Cleaning
                                </div>
                            </div>
                            <img src="../assets/img/wiping-mirror.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    House Vacuum
                                </div>
                            </div>
                            <img src="../assets/img/vacuuming.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    Floor Mopping
                                </div>
                            </div>
                            <img src="../assets/img/mopping.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    Garden Service
                                </div>
                            </div>
                            <img src="../assets/img/lawn-mowing.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    Car Washing
                                </div>
                            </div>
                            <img src="../assets/img/car-washing.jpg" class="img-responsive" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="success" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>About</h2>
                        <hr class="star-light">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <p>
                            We only hire trustworthy & reliable cleaners. 
                            We carefully check the background of each & everyone, for your peace of mind. We are just a phone call away. 
                            Our dedicated customer support members are available daily, from 9am to 5pm to ensure you have a great experience - everytime
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p>
                            Want to book a cleaner with us ?
                            Booking a cleaner couldn't be easier. Book friendly, fully-vetted home cleaner in 60 seconds! 
                            We now cover most major districts in Melaka.
                        </p>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                        <a href="#contact" class="btn btn-lg btn-outline">
                            <i class="fa fa-phone"></i> &nbsp; Book A Maid Now!
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Contact Us</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <div class="text-primary text-center">
                            <h3>
                                <i class="fa fa-user-circle-o"></i> Anis
                            </h3>
                            <h3 class="text-lowercase">
                                <i class="fa fa-instagram"></i> @anis_maid
                            </h3>
                            <h3>
                                <i class="fa fa-facebook-f"></i> ANIS MAID
                            </h3>
                            <h3 class="text-lowercase">
                                <i class="fa fa-envelope"></i> anis@gmail.com 
                            </h3>
                            <h3>
                                <i class="fa fa-phone-square"></i> 0179909898
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-6">
                            <h3>Location</h3>
                            <p>Hang Tuah Jaya, 
                                <br>76100 Durian Tunggal, Melaka</p>
                        </div>

                        <div class="footer-col col-md-6">
                            <h3>Sneak Peek</h3>
                            <p>
                                We will pay attention to every corner of your living room, kitchen, bedrooms, bathrooms, and more. Y
                                our house will get all the attention it needs. <a href="https://www.instagram.com/p/BYn7KQhg3-i/?hl=en&taken-by=rdcfc">More...</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; Anis Maid 2016
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- Add Modal Start -->
        <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <h3 class="modal-title">Login</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form class="form-horizontal" id="loginForm">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Username</label>  
                                <div class="col-md-4">
                                    <input id="name" name="name" type="text" placeholder="Enter your username" class="form-control input-md" required>
                                    
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="Enter your password" class="form-control input-md" required>
                                </div>
                            </div>

                        </form>
                        <div class="text-center">
                            <span>
                                <button id="btnLogin" type="button" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
                            </span>
                            &nbsp;
                            <span>
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear()"><i class="fa fa-times"></i> Close</button>
                            </span>
                            
                        </div>
                        
                        <!-- content goes here -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Modal End -->  

        <?php require './library/footer.php';?>

        <!-- Theme JavaScript -->
        <script src="../assets/js_fl/freelancer.min.js"></script>
        <script src="../assets/js_fl/jquery.easing.min.js"></script>        
        
        <script type="text/javascript">
            $('#btnLogin').on('click', function(){
                
                if(!$('#loginForm')[0].checkValidity() ){
                    $('<input type="submit">').hide().appendTo('#loginForm').click().remove();
                }
                else{
                    var name = document.getElementById('name');
                    var password = document.getElementById('password');
                    
                    var data={
                        name : name.value,
                        password : password.value
                    };
                    $.ajax({
                       type: 'POST',
                       data: data,
                       timeout: 5000,
                       url: "login_process.php",
                       success: function (data, textStatus, jqXHR) {
                           if(data.trim()==="0"){
                                window.location="home.php";
                            }
                            else if(data.trim()==="1"){
                                $.messager.alert('Oops!', 'Username is not exist!', 'warning');
                            }
                            else if(data.trim()==="2"){
                                $.messager.alert('Oops!', 'Incorrect password!', 'warning');
                            }
                            else{
                                alert(data);
                            }
                        },
                        error: function(err, status, errorThrown){
                            alert(errorThrown);
                            console.log("error");
                        }                        
                    });
                }
                
                
            });
            
            
            function clear(){
                $('#loginForm')[0].reset();
            }
           
           
        </script>

    </body>

</html>

