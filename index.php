<?php

   include "inc.php";

   $validation = new validation;
   $queries    = new queries;
   $sendEmail  = new sendEmail;



   if (isset($_POST['register'])){
     
     $validation->validate('fullName','full name', 'required');
     $validation->validate('email','Email', 'uniqueEmail|users|required');
     $validation->validate('password','Password', 'required|min_len|6');

     if($validation->run()){

        $fullName = $validation->input('fullName');
        $email    = $validation->input('email');
        $password = $validation->input('password');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $code = rand();
        $code = password_hash($code, PASSWORD_DEFAULT);
        $url = "http://" . $_SERVER['SERVER_NAME'] . "/emailConfirmation/confirm.php?confirmation=" . $code;
        $status = 0;
        if($queries->query("INSERT INTO users (fullName, email, password, code, status)
        
         VALUES(?,?,?,?,?) ", [$fullName, $email, $password, $code, $status])){

           if($sendEmail->send($fullName, $email, $url)){
             $_SESSION['accountCreated'] = "Your account has been created successfully please verify your email";
             header("location: login.php");
           }

        }
     }

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
    <http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <?php include "components/styles.php"; ?>
</head>
<body>
  <?php include "components/nav.php"; ?>
  <div class="container">
  <div class="row mt-5">
  <div class="col-md-5">
  <div class="card">
  <div class="card-body">
  <form action="" method="POST">
    <div class="form-group">
      <h3>Registration Form</h3>
    </div>
    <div class="form-group">
      <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name"
      value="<?php if($validation->input('fullName')): echo $validation->input('fullName');
      endif; ?>">
    </div>
    <div class="error">
        <?php if(!empty($validation->errors['fullName'])): echo $validation->errors['fullName']; endif;?>
    </div>

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="Email"
      value="<?php if($validation->input('email')): echo $validation->input('email');
      endif; ?>">
    </div>
    <div class="error">
        <?php if(!empty($validation->errors['email'])): echo
         $validation->errors['email']; endif;?>
    </div>

    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Create new password"
      value="<?php if($validation->input('password')): echo $validation->input('password');
      endif; ?>">
    </div>
    <div class="error">
        <?php if(!empty($validation->errors['password'])): echo $validation->errors['password']; endif;?>
    </div>

    <div class="form-group">
      <input type="submit" name="register" class="btn btn-info" value="Register &rarr;" style="background: #7B68EE!important">
    </div>
  </form>
  </div>
  </div>
  </div>
  <div class="col-md-5 text-white ml-auto">
    <h1>Registration Form</h1>
    <p>Lorem ipsum tes.</p>

  </div>
  </div>
  </div>
</body>
</html>
