<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Futsal Apps Login Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
            <div class="login-page">
  <div class="form">
    <form class="register-form" action="proses-forgot.php" method="post">
      <input type="text" name="email" placeholder="email address"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="password" name="repassword" placeholder="re-type password"/>
      <button name="btnReset">Submit</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="./proses.php" method="post">
      <input type="text" name="username" placeholder="username" required />
      <input type="password" name="password" placeholder="password" required />
      <button name="login">login</button>
      <p class="message">Forgot Password? <a href="#">Forgot</a></p>
    </form>
  </div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script id="rendered-js">
      $('.message a').click(function () {
  $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
});
      //# sourceURL=pen.js
    </script>
    </body>

</html>
