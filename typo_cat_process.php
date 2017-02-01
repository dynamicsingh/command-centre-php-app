<?php
include 'connection.php';

$name=$_POST['name_cat'];

if(isset($_FILES["photo"]["error"])){
    if($_FILES["photo"]["error"] > 0){
        echo "Error: " . $_FILES["photo"]["error"] . "<br>";
    }else{
        $allowed = array("pdf" => "application/pdf", "doc" => "application/doc", "docx" => "application/pdf", "rar" => "application/rar", "zip" => "application/zip" , "gz" => "application/gzip" , "docm" => "application/doc" , "xps" => "application/xps", "xls" => "application/xls", "xlsb" => "application/xlsb", "xlsx" => "application/xlsx", "xlr" => "application/xlr", "jpeg" => "image/jpeg", "jpg" => "image/jpg",  "png" => "image/png", "gif" => "image/gif", "webp" => "image/webp", "svg" => "image/svg", "ppt" => "application/ppt");
        $random_digit=rand(0000,9999);
        $filename = $_FILES["photo"]["name"];
        $new_file_name=$random_digit.$filename;
        echo $filename;
        $filetype = $_FILES["photo"]["type"];
        echo $filetype;
        $filesize = $_FILES["photo"]["size"];
        echo $filesize;
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){ 
        $errmsg_arr[] = 'Please upload the file with valid format ';
    	$errflag = true;
    
     //If there are input validations, redirect back to the login form
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: typo.php");
    exit();
    }
	
        }
    
        // Verify file size - 5MB maximum
        $maxsize = 1000 * 1024 * 1024;
        if($filesize > $maxsize){
                $errmsg_arr[] = 'Please upload the file within 5MB ';
    	$errflag = true;
    
     //If there are input validations, redirect back to the login form
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: typo.php");
    exit();
    }
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("img/typo_cat/" . $new_file_name)){
                echo $_FILES["photo"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/typo_cat/" . $new_file_name);
				$id="3";	
	mysqli_query($link, "INSERT INTO genre_to_category( genre_id, category_name, image)
	VALUES('$id', '$name', '$new_file_name')") or die("Error " . mysqli_error($link));
	
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file - please try again."; 
        }
    }
} else{
    echo "Error: Invalid parameters - please contact your server administrator.";
}

header("location: typo.php?sts=xzkjsajskaosjoi!9sasjknazshhqs ");

?>