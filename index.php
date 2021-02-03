<?php
    if(isset($_COOKIE['email'])) {
?>
        <html>
        <head>
            <title>My page</title>
            <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container">
                <a href="api/signout.php" class="btn btn-danger">LOG OUT</a>
                <h2>Hello, <?php echo $_COOKIE['email']; ?></h2>
            </div>
        </body>
        </html>
<?php
    }else{
?>
<html>
<head>
    <title>My page</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="col-sm-6 col-sm-offset-3">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#login-page">Login</a></li>
    <li><a data-toggle="tab" href="#sign-page">Signup</a></li>
    </ul>

    <div class="tab-content">
    <div id="login-page" class="tab-pane fade in active">
        <form id="login-form" action="" method="POST" onsubmit="return false">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-success" value="login">
        </div>
        </form>
    </div>
    <div id="sign-page" class="tab-pane fade">
        <form id="signup-form" action="" method="POST" onsubmit="return false">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <input type="submit" name="signup" class="btn btn-success" value="signup">
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        $(document).ready(function(){
            $('#signup-form').on('submit', function(){
                $.post('api/signup.php', $(this).serialize(), function(response){
                    location.reload();
                });
            });

            $('#login-form').on('submit', function(){
                $.post('api/login.php', $(this).serialize(), function(response){
                    let resp = JSON.parse(response);
                    setCookie('email', resp.email, 1);
                    location.reload();
                });
            });
        });
    </script>
</body>
</html>
<?php
    }
?>