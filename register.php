<?php include('db.php');?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>

    <?php include('navbar1.php');?>
    <h3 class="text-center mt-2">Register yourself</h3>
    <div class="container">
    <form method="POST">
      Enter name: <input type="text" class="form-control" name="uname">
      <br><br>
      Enter email:<input type="text" class="form-control" name="email">
      <br><br>
      Enter password:<input type="password" class="form-control" name="psw">
      <br><br>
      Enter confirm-password:<input type="password" class="form-control" name="confirmpsw">
      <br><br>
      <input type="submit" value="Register" name="btn" class="btn btn-primary">
    </form>
  </div>

  <?php
    if(isset($_POST['btn']))
    {
      $nm=$_POST['uname'];
      $em=$_POST['email'];
      $p=$_POST['psw'];
      $cp=$_POST['confirmpsw'];

        if($p==$cp)
        {
          $ps=md5($p);

          $q="insert into userRegister(name,email,password)values('$nm','$em','$ps');";

          $query=mysqli_query($conn,$q) or die("Error in executing error".mysqli_error($conn));

          if(mysqli_affected_rows($conn)>0)
          {
            echo "<script>alert('Register Succesfully');
            window.location.href='login.php';</script>";
          }
          else
          {
            echo "<Script>alert('Error in registering');</script>";
          }
        }
        else
        {
          echo "<script>alert('password and confirm password does not match');</script>";
        }
    }

  ?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>