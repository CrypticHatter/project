<?php
    //start session
    session_start();

    //redirect if logged in
    if(isset($_SESSION['user'])){
        header('location:home.php');
    }

    // otherwise render the login and signup 
    include_once('db.php');  
       
    $funObj = new Db();  
    if(isset($_POST['login'])){  
        $email = $_POST['email'];  
        $password = $_POST['password'];
       
        $user = $funObj->Login($emailid, $password);  
        if ($user) {  
            // Registration Success  
           header("location:home.php");  
        } else {  
            // Registration Failed  
            echo "<script>alert('Emailid / Password Not Match')</script>";  
        }  
    }  
    if(isset($_POST['register'])){  
        $username = $_POST['username'];  
        $emailid = $_POST['emailid'];  
        $password = $_POST['password'];  
        $confirmPassword = $_POST['confirm_password'];  
        if($password == $confirmPassword){  
            $email = $funObj->isUserExist($emailid);  
            if(!$email){  
                $register = $funObj->UserRegister($username, $emailid, $password);  
                if($register){  
                     echo "<script>alert('Registration Successful')</script>";  
                }else{  
                    echo "<script>alert('Registration Not Successful')</script>";  
                }  
            } else {  
                echo "<script>alert('Email Already Exist')</script>";  
            }  
        } else {  
            echo "<script>alert('Password Not Match')</script>";  
          
        }  
    }  
?>  
<!DOCTYPE html>  
 <html lang="en" class="no-js">  
 <head>  
        <meta charset="UTF-8" />  
        <title>Login and Registration Form with HTML5 and CSS3</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />  
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />  
        <meta name="author" content="Codrops" />  
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css" />  
    </head>  
    <body>  
        <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto p-0">
                <div class="card">
                    <div class="login-box">
                        <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                            <div class="login-space">
                                <div class="login">
                                    <form action="" method="post">
                                        <div class="group"> <label for="user" class="label">Email</label> <input id="user" type="text" name="email" class="input" placeholder="Enter your username"> </div>
                                        <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" name="email" class="input" data-type="password" placeholder="Enter your password"> </div>
                                        <!-- <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div> -->
                                        <div class="group"> <input type="submit" class="button" name="login" value="login"> </div>
                                    </form>
                                </div>
                                <div class="sign-up-form">
                                <div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" type="text" class="input" placeholder="Enter your email address"> </div>
                                    <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Create your password"> </div>
                                    <div class="group"> <label for="pass" class="label">Repeat Password</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Repeat your password"> </div>
                                    <div class="group"> <input type="submit" class="button" value="Sign Up"> </div>
                                    <!-- <div class="hr"></div> -->
                                    <!-- <div class="foot"> <label for="tab-1">Already Member?</label> </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        </div>
    </body>  
</html>