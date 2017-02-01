<?php
include 'connection.php';
session_start();
$user=$_SESSION['SESS_MEMBER_ID'];

switch($_REQUEST['aim']){
    
    case 'category':
    
switch($_REQUEST['action']){
    
    case 'add' :
    $name=$_POST['name_cat'];
    $loc=$_POST['header_loc'];
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
    header("location:$loc");
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
    header("location: $loc");
    exit();
    }
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("img/website_cat/" . $new_file_name)){
                echo $_FILES["photo"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/website_cat/" . $new_file_name);
				$id=$_POST['genre_id'];	
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

header("location: $loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
    
break;
    
    
    
  case 'edit' :
    $name=$_POST['name_cat'];
    $loc=$_POST['header_loc'];
    $id=$_POST['id'];
    if(isset($_FILES["photo"]["error"])){
    if($_FILES["photo"]["error"] > 0){
        $genre_id=$_POST['genre_id'];	
        $query = "Update genre_to_category set `genre_id` = '" .$genre_id. "', `category_name` = '" .$name. "' Where `id`='".$id."' " or die(mysqli_error($link));
        $sql = mysqli_query($link, $query) or die(mysqli_error($link));            
        header("location: $loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
        //echo "Error: HEllo" . $_FILES["photo"]["error"] . "<br>";
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
    header("location:$loc");
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
    header("location: $loc");
    exit();
    }
        }
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("img/website_cat/" . $new_file_name)){
                echo $_FILES["photo"]["name"] . " is already exists.";
            } else{
                //Delete the old file from folder
                $genre_id=$_POST['genre_id'];
                $sql = mysqli_query($link, "Select * FROM `genre_to_category` WHERE `genre_id`= '$genre_id' AND `id`='$id' ") or die(mysqli_error($link));
                $row= mysqli_fetch_array($sql, MYSQLI_BOTH);
                $image = $row['image'];
                unlink("img/website_cat/$image");
                //Move the new uploaded file to directory
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/website_cat/" . $new_file_name);
                //Insert new enteries in Db
				
    $query = "Update genre_to_category set `genre_id` = '" .$genre_id. "', `category_name` = '" .$name. "', `image` = '" .$new_file_name. "' Where `id`='".$id."' " or die(mysqli_error($link));
$sql = mysqli_query($link, $query) or die(mysqli_error($link));            
    
                echo "<br>Editing Done successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file - please try again."; 
        }
    }
} else{
    echo "Error: Invalid parameters - please contact your server administrator.";
}

header("location: $loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
    
break;
       

    
case 'delete':
    $cat_id = $_GET['cat_id'];
    $loc=$_GET['loc'];
                //Delete the old file from folder
                $genre_id=$_POST['genre_id'];
                $sql = mysqli_query($link, "Select * FROM `genre_to_category` WHERE `genre_id`= '$genre_id' AND `id`='$cat_id' ") or die(mysqli_error($link));
                $row= mysqli_fetch_array($sql, MYSQLI_BOTH);
                $image = $row['image'];
                unlink("img/website_cat/$image");
    
    //Query for deleting Row
    mysqli_query($link, "DELETE FROM genre_to_category WHERE id=$cat_id ") or die("Error " .  mysqli_error($link));
    header("location:$loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
    
    break;
    
}

    break;
    
    
    case 'content':
    $loc=$_POST['header_loc'];
    
    switch($_REQUEST['action']){
    
    case 'add' :
       
        $name=$_POST['web_name'];
        $href=$_POST['web_link'];
        $content=$_POST['web_cont'];
        $id=$_POST['cat_id'];
        $loc=$_POST['header_loc'];
        mysqli_query($link, "INSERT INTO category_to_content( category_id, name_heading, link, content, user_id)
	VALUES('$id', '$name', '$href','$content','$user')") or die("Error " . mysqli_error($link));
            
        mysqli_query($link, "INSERT INTO log( category_id, name_heading, link, content, user_id, timestamp)
	VALUES('$id', '$name', '$href','$content','$user', Now() )") or die("Error " . mysqli_error($link));
	
        header("location: $loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
        
    break;
        
    case 'edit' :
       
        $name=$_POST['web_name'];
        $href=$_POST['web_link'];
        $content=$_POST['web_cont'];
        $id=$_POST['cat_id'];
        $content_id=$_POST['content_id'];
         $loc=$_POST['header_loc'];
	
        $genre_id="1";	
    $query = "Update category_to_content set `category_id` = '" .$id. "', `name_heading` = '" .$name. "', `link` = '" .$href. "', `content` = '" .$content. "' Where `id`='".$content_id."' " or die(mysqli_error($link));
$sql = mysqli_query($link, $query) or die(mysqli_error($link));           
        
        
        header("location: $loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
        
    
    break;
       

    
case 'delete':
    $content_id = $_GET['content_id'];
    $loc=$_GET['loc'];
    //Query for deleting Row
    mysqli_query($link, "DELETE FROM category_to_content WHERE id=$content_id ") or die("Error " .  mysqli_error($link));
    header("location:$loc?sts=xzkjsajskaosjoi!9sasjknazshhqs ");
    
    break;
    
}
    
    
    
    
    
    break;
    
}


?>