<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Digilib</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="<?php echo base_url(); ?>/public/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }

  </style>
  <link href="<?php echo base_url(); ?>/public/css/bootstrap-responsive.min.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.js"></script>
<![endif]-->
</head>

<body>

  <div class="container">

    <form action="javascript:void(0)" method="post" class="form-signin">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input id="email" name="email" type="text" class="input-block-level" placeholder="Username">
      <input id="password" name="password" type="password" class="input-block-level" placeholder="Password">
      <div id="error">
      </div>
      <button id="submitbutton" class="btn btn-large btn-primary" type="submit">Sign in</button>
    </form>

  </div> <!-- /container -->

<!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>/public/js/main.js"></script>
</body>
</html>
