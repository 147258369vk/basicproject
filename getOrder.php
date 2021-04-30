<?php
	include('db.php');

	$uid=$_GET['uid'];
	$pid=$_GET['prod_id'];


	$q="insert into userorder(prod_id,user_id)values('$uid','$pid');";

	$query=mysqli_query($conn,$q) or die(mysqli_error($conn));

	if(mysqli_affected_rows($conn)>0)
	{
		echo "<script>alert('Order Placed');
			window.location.href='order.php';</script>";
	}
	else
	{
		echo "<script>alert('Errorin placing Order');
			</script>";
	}



?>