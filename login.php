<?php
include "inc.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
    <http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <?php include "components/styles.php"; ?>
</head>
<body>
  <?php include "components/nav.php"; ?>
  <div class="container">
  <div class="row mt-5">
  <div class="col-md-5">
    
  <?php if (isset($_SESSION['accountCreated'])): ?>
    <div class="alert alert-success">
      <?php echo $_SESSION['accountCreated']; ?>
    </div>
  <?php endif; ?>
  <?php unset($_SESSION['accountCreated']); ?>

  <!-- USER aCCOUNT HAS BEEN VERFIED SUCCEFULLY -->

  <?php if (isset($_SESSION['emailVerified'])): ?>
    <div class="alert alert-success">
      <?php echo $_SESSION['emailVerified']; ?>
    </div>
  <?php endif; ?>
  <?php unset($_SESSION['emailVerified']); ?>


  <div class="card">
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group">
      <h3>Login Form</h3>
    </div>
    
    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="Enter Email">
    </div>

    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Create new password">
    </div>

    <div class="form-group">
      <input type="submit" name="login" class="btn btn-info" value="Login &rarr;" style="background: #7B68EE!important">
    </div>
  </form>
  </div>
  </div>
  </div>
  <div class="col-md-5 text-white ml-auto">
    <h1>Login Form</h1>
    <p>Lorem ipsum tes.</p>

  </div>
  </div>
  </div>
</body>
</html>
