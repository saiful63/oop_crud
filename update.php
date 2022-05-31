<!DOCTYPE html>
<?php 
include 'inc/header.php'; 
include "config.php";
include "database.php";
?>

<?php
$id=$_GET['id']; 
$db=new Database();

$query="SELECT * FROM tabl WHERE id=$id";

$getData=$db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($db->link,$_POST['name']);

	$email=mysqli_real_escape_string($db->link,$_POST['email']);


	$skill=mysqli_real_escape_string($db->link,$_POST['skill']);

if($name==''||$email==''||$skill==''){
	$error="Field is empty";
}

else{
	$query="update tabl set name='$name',email='$email',skill='$skill' where id=$id";
	$update=$db->update($query);
}



}


?>

<?php

if(isset($_POST['delete'])){
	$query="delete from tabl where id=$id";
	$deleteData=$db->delete($query);
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


<form action="update.php?id=<?php echo $id;?>"  method="post">
<center><table bgcolor="orange"border="2" width="500px">
	
	
<tr>
	<td>Name</td>
	<td><input type="text" name="name" value="<?php echo $getData['name']?>"></td>
</tr>

<tr>
	<td>Email</td>
	<td><input type="text" name="email"value="<?php echo $getData['email']?>"></td>
</tr>

<tr>
	<td>Skill</td>
	<td><input type="text" name="skill"value="<?php echo $getData['skill']?>"></td>
</tr>


<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="Update">
		<input type="reset" name="submit" value="cencel">

		<input type="submit" name="delete" value="Delete">
	</td>

	
</tr>
	

</table>


</center>
</form>
<a href="index.php">GO Back</a>
<?php include 'inc/footer.php'; ?>
</body>
</html>