<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="admin/css/style2.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Administrator Login</h1>
      <form method="post" action="admin/?rdr=validator">
        <p><input type="text" name="username" value="" placeholder="Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
         <label>
          <!--  <input type="checkbox" name="remember_me" id="remember_me">-->
           <!-- OR Click <a href="./?rdr=register">Here</a> to Register-->
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <!--<p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>-->
    </div>
  </section>

  <section class="about">
    <p class="about-links">
      <a href="./?rdr=home" target="_parent">&laquo; Back 2 Home</a>
      <a href="#" target="_parent"></a>
    </p>
    <p class="about-author">
      &copy; <?php echo date('Y'); ?> <a href="./?rdr=home" target="_blank">www.apply.oauife.edu.ng</a>
      
  </section>
</body>
</html>
