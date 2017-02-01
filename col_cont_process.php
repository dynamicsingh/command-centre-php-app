<?php
include 'connection.php';
$name=$_POST['col_name'];
$hash=$_POST['hash_val'];
$tag=$_POST['tag'];
$id=$_POST['cat_id'];

	mysqli_query($link, "INSERT INTO category_to_content( category_id, name_heading, link, content)
	VALUES('$id', '$name', '$hash','$tag')") or die("Error " . mysqli_error($link));
	
header("location: colors.php?sts=xzkjsajskaosjoi!9sasjknazshhqs ");

?>