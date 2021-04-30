<?php
include('db.php');

session_start();

if($_SESSION['user']=="")
{
  header('location:login.php');
}


 ?>
<?php
    //to get the user id

  $email=$_SESSION['useremail'];

    $qid="select id from userRegister where email='$email';";

    $queryid=mysqli_query($conn,$qid);

    $row=mysqli_fetch_array($queryid);

    $userid=$row['id'];




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Profile</title>
  </head>
  <body>

    <?php include('navbar2.php');?>

 <h4>Welcome <?php echo $_SESSION['user'];?>

 <br><br>
 <div class="container">
    <div class="row">

  <?php
    $q="select * from product;";

    $query=mysqli_query($conn,$q) or die("query is not executed");

    if(mysqli_num_rows($query)>0)
    {
      while($row=mysqli_fetch_array($query))
      {
        ?>
    

        <div class="col-md-4">

               <div class="card" style="width: 18rem;">
  <img src="<?php echo $row['productimage'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['pname'];?></h5>
    <p class="card-text">Rs. <?php echo $row['price'];?>
      <br>
      Quantity: <?php echo $row['qty'];?>
    </p>
    <a href="getOrder.php?uid=<?php echo $userid;?>&prod_id=<?php echo $row['pid'];?>" class="btn btn-primary">Place an order</a>
  </div>
</div>

        </div>

        <!-- http://localhost/mycode/database/getOrder.php?uid=1&prod_id=1 -->

    



<?php
      }
    }
    else
    {
      echo "No products are listed";
    }



  ?>




   

    </div>


 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>