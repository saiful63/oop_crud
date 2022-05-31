<!DOCTYPE html>

<?php 
include 'inc/header.php'; 
include "config.php";
include "database.php";
?>





<?php
$db=new Database();




if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($db->link,$_POST['name']);

	$email=mysqli_real_escape_string($db->link,$_POST['email']);


	$skill=mysqli_real_escape_string($db->link,$_POST['skill']);

if($name==''||$email==''||$skill==''){
	$error="Field is empty";
}

else{
	$query="INSERT INTO `tabl` (`name`, `email`, `skill`) VALUES ('$name', '$email', '$skill');";
	$create=$db->insert($query);
}



}


?>




<html>
<head>
	<title></title>
</head>
<body>


<?php

if(isset($error)){
   echo"<span style='color:green'>".$error."</span>";
}

?>


<form action=""  method="post">
<center><table bgcolor="orange"border="2" width="500px">
	
	
<tr>
	<td>Name</td>
	<td><input type="text" name="name"placeholder="Enter your name"></td>
</tr>

<tr>
	<td>Email</td>
	<td><input type="text" name="email"placeholder="Enter your Email"></td>
</tr>

<tr>
	<td>Skill</td>
	<td><input type="text" name="skill"placeholder="Enter your Skill"></td>
</tr>


<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="submit">
		<input type="reset" name="submit" value="cencel">
	</td>

	
</tr>
	

</table>


</center>
</form>
<a href="index.php">GO Back</a>
<?php include 'inc/footer.php'; ?>
</body>
</html>