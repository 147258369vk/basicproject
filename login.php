<?php 
include('db.php');

session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>

    <?php include('navbar1.php');?>
    <h3 class="text-center mt-2">Login Here</h3>
    <div class="container">
    <form method="POST">
     
      Enter email:<input type="text" class="form-control" name="email">
      <br><br>
      Enter password:<input type="password" class="form-control" name="psw">
      <br><br>
      <input type="submit" value="login" name="btn" class="btn btn-primary">
    </form>

    <?php
        if(isset($_POST['btn']))
        {
          $e=$_POST['email'];
          $p=md5($_POST['psw']);


          $q="select * from userRegister where email='$e' and password='$p';";

          $query=mysqli_query($conn,$q) or die("query is not executed ".mysqli_error($conn));

            if(mysqli_num_rows($query)==1)
            {
              $row=mysqli_fetch_array($query);

              // echo $row['name'];
                $_SESSION['user']=$row['name'];
                $_SESSION['useremail']=$row['email'];
                header('location:profile.php');

            }
            else
            {
              echo "no records found";
            }

        }


    ?>

  </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>