<?php include('db.php');
session_start();

$em=$_SESSION['useremail'];
$q="select * from userRegister where email='$em';";

$query=mysqli_query($conn,$q) or die('query is not executed' .mysqli_error($conn));


$row=mysqli_fetch_array($query);

?>



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

    <?php include('navbar2.php');?>
    <h3 class="text-center mt-2">Edit profile</h3>
    <div class="container">
    <form method="POST">
      Enter name: <input type="text" class="form-control" name="uname" value="<?php echo $row['name'];?>">
      <br><br>
      Enter email:<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly>
      <br><br>
      Enter password:<input type="password" class="form-control" name="psw" value="<?php echo $row['password'];?>">
      <br><br>
     
   
      <input type="submit" value="Register" name="btn" class="btn btn-primary">
    </form>
  </div>

  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>