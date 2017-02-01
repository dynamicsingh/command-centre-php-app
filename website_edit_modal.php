<?php
include("connection.php");

switch($_REQUEST['aim']){

    
case 'category':
    
if(!empty($_GET["id"])){ $main_id = $_GET["id"];$genre_id=$_GET["g_id"];$loc=$_GET["loc"];}
$sql = mysqli_query($link, "Select * FROM `genre_to_category` WHERE `genre_id`= '$genre_id' AND `id`='$main_id' ") or die(mysqli_error($link));
    $row= mysqli_fetch_array($sql, MYSQLI_BOTH);
    $image = $row['image'];
    $name  = $row['category_name'];
?>


<form action="website_process.php?action=edit&aim=category" method="post" role="form" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $main_id; ?>" name="id"/>
    <input name="genre_id" type="hidden" value="<?php echo $genre_id; ?>"/>
         <input name="header_loc" type="hidden" value="<?php echo $loc; ?>"/>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-image"></i></span>
        <input type="file" name="photo" value="<?php echo $image; ?>" id="fileSelect" />
    </div>
    <br>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        <input type="text" class="form-control"  value="<?php echo $name; ?>" name="name_cat" placeholder="Name of the Category" required>
    </div>
    <br>
    <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Update </button>

</form>
<?php 
break;

case 'content':
    if(!empty($_GET["id"])){ $id = $_GET["id"];$loc=$_GET["loc"]; }
    if(!empty($_GET["content_id"])){ $content_id = $_GET["content_id"]; }
  $sql1 = mysqli_query( $link , "Select * FROM `category_to_content` WHERE `category_id`= '$id' AND `id`= '$content_id' ") or     die(mysqli_error($link));
                      $row1 = mysqli_fetch_array($sql1, MYSQLI_BOTH);
                      $name = $row1['name_heading'];
                      $link = $row1['link'];
                      $content = $row1['content'];   
?>

<form action="website_process.php?aim=content&action=edit" method="POST" role="form" >
                     <input type="hidden" name="cat_id"  value="<?php echo $id; ?>"/>
                     <input type="hidden" name="content_id"  value="<?php echo $content_id; ?>" />
                    <input name="header_loc" type="hidden" value="<?php echo $loc; ?>"/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" name="web_name" value="<?php echo $name; ?>" class="form-control" placeholder="Google" required>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                        <input type="text" name="web_link" value="<?php echo $link; ?>" class="form-control" placeholder="https://www.google.com" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                        <textarea type="text" name="web_cont" class="form-control"><?php echo $content; ?></textarea>
                    </div>   
                    <br>  
            <button type="submit" class="btn btn-primary"><i class="fa fa-share"></i> Update </button>
    <a href='website_process.php?aim=content&action=delete&loc=<?php echo $loc;?>&content_id=<?php echo $content_id;?>'><button class="btn btn-danger pull-right" type="button" ><i class="fa fa-trash"></i> Delete </button></a>
   
</form>




<?php
    break;
}
?>