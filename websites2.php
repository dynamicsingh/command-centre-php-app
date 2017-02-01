<?php 
if(!empty($_GET['sts']) AND $_GET['sts'] == "xzkjsajskaosjoi!9sasjknazshhqs" ) {
$sts = "Successfully Executed" ;
}  
session_start();
$user=$_SESSION['SESS_MEMBER_ID'];
if (!isset($_SESSION['LAST_ACTIVITY_step1']) || (time() -   $_SESSION['LAST_ACTIVITY_step1'] > 900000)) {
session_destroy();
session_unset();
header("Location: destroy.php");
}
 $_SESSION['LAST_ACTIVITY_step1'] = time(); // the start of the session.

?>

<html>
<head><title>Command Centre</title><link rel="shortcut icon" href="img/favicon.png"><link href="css/bootstrap.min.css" rel="stylesheet"><link href="css/style.css" rel="stylesheet"><link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
<div class="container-fluid">
    <!-- Second navbar for categories -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><i class="fa fa-bullseye fa-lg"></i>
Command Centre</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="websites.php"><i class="fa fa-globe"></i> Websites</a></li>
            <?php if($user=='1'){ ?><li><a href="Technology.php"><i class="fa fa-code"></i> Technical</a></li>
            <li><a href="colors.php"><i class="fa fa-paint-brush"></i> Colors</a></li>
            <li><a href="typo.php"><i class="fa fa-pencil"></i> Typography</a></li>
              <? } ?>
            <li><a href="destroy.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            <?php if($user=='1'){ ?><li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">
 Coding</a>
            </li><?php } ?>
               
          </ul>
          <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
            <li><a href="coding/php.php"><i class="fa fa-code"></i> PHP</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    </div>
     
               
        
      <div class="col-lg-10 col-md-offset-1">
          <?php if(!empty($sts)){
	?>
<div id="boxalert"  class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success !</strong> <?php echo $sts; ?>
</div>
<?php }?>
           <?php if($user=='1'){ ?><div class="row"><div class="col-lg-6" style="padding-bottom:20px;"><input class="form-control" id="container-search1" placeholder="Search Category"></div><div class="col-lg-3 pull-right" style="padding-bottom:10px;"><Button href="" class="btn btn-default"  type="button" title="Add" data-toggle="modal" data-target="#addcat"><i class="fa fa-globe"></i> Add New Website Category</button></div></div><?php } ?>
        
        
  <div class="row">
<br>
    <section id="pinBoot">
        
<?php 
include 'connection.php';
//Select Query
$i=0;
$sql = mysqli_query($link, "Select * FROM `genre_to_category` WHERE `genre_id`= 1 AND (`user_id`= $user OR `user_id`='s') ") or die(mysqli_error($link));
while($row= mysqli_fetch_array($sql, MYSQLI_BOTH)){
    $id = $row['id'];
    $image = $row['image'];
    $name  = $row['category_name'];
    
?>
<article class="white-panel"> 
        <div>
          <img class="lazy" src="<?php echo 'img/website_cat/'.$image;?>"  title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/>
          <div>         		
          <br>
          <div class="input-group">
                  <input type="search" id="<?php echo 'container-search'.$i; ?>" value="" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button class="open-AddBookDialog btn btn-default" type="button" title="Add" data-toggle="modal" data-id="<?php echo $id; ?>" data-target="#myModal"> Add new </button>
                  </span>
            </div><!-- /input-group -->
              
                <div class="scroller_web" id="<?php echo 'searchable-container'.$i; ?>">
              <?php
                include 'connection.php';
                //query for getting count of number of records
                
                  $sql1x = mysqli_query( $link , "Select * FROM `category_to_content` WHERE `category_id`= '$id' ") or     die(mysqli_error($link));
                if($user=='1'){ 
                $sql1 = mysqli_query( $link , "Select * FROM `category_to_content` WHERE `category_id`= '$id' ") or     die(mysqli_error($link));
                }
            else
                { 
                $sql1 = mysqli_query( $link , "Select * FROM `category_to_content` WHERE `category_id`= '$id' AND `user_id`= '$user' ") or     die(mysqli_error($link));
                }
                  while( $row1 = mysqli_fetch_array($sql1, MYSQLI_BOTH)){
                      $name = ucfirst($row1['name_heading']);
                      $link = $row1['link'];
                      $content_id = $row1['id'];
                      $content = ucfirst($row1['content']);
                  ?>
                    
                    <div class="search"><p class="abc"><a class="heading" href='<?php echo $link; ?>' target="_blank" ><?php echo $name; ?></a> - <a class="content" onclick="ActionFunction('website_edit_modal.php?aim=content&id=<?php echo $id;?>',<?php echo $content_id; ?>,'edit_content');"  data-title="Edit" data-toggle="modal" data-target="#editcont" data-placement="top" > <?php echo $content; ?> </a></p></div>
                  
                  
               <?php 
                  }
                  
                $num_of_records=mysqli_num_rows($sql1x);
               ?>
                   <br>
                  </div>
                  <!--- For the setting for editing category--->
                 <?php if($user=='1'){ ?><a href="javascript:void(0);"><i data-toggle="collapse" data-target="#<?php echo $i;?>" class="fa fa-cog fa-lg grey pull-right"></i></a><?php } ?>
          <span class="text pull-right" style="margin-left:5px;"><strong><?php echo $num_of_records;?></strong></span>
                 <div id="<?php echo $i;?>" class="collapse out">
                <br>
                  <?php //echo $id;?>
                   
                 <div class="input-group">
                  <span class="input-group-btn">
                      <button class="btn btn-default" onclick="ActionFunction('website_edit_modal.php?aim=category',<?php echo $id; ?>,'edit_category');"  data-title="Edit" data-toggle="modal" data-target="#editcat" data-placement="top" ><i class="fa fa-pencil-square-o"  ></i> Edit  </button>
                      <a href='website_process.php?aim=category&loc=websites.php&action=delete&cat_id=<?php echo $id;?>'><button class="btn btn-default" type="button" ><i class="fa fa-trash"></i> Delete </button></a>
                  </span>
                </div><!-- /input-group -->
                
                </div> 
                   <!---END  For the setting for editing category--->
                  
              
          </div>
      </div>
</article>
    

<?php
$i++;
}
echo $i;

?>
        

</section>



  </div>


</div>
        
<!-- Modal for adding new category -->
<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabelcat" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-globe"></i> Add New Website Category</h4>
      </div>
      <div class="modal-body">
          <br>
                <form action="website_process.php?aim=category&action=add" method="post" role="form" enctype="multipart/form-data">
                    <input name="genre_id" type="hidden" value="1"/>
                    <input name="header_loc" type="hidden" value="websites.php"/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                        <input type="file" name="photo" id="fileSelect" />
                    </div><br>
                    
                    <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text"  autocomplete="off" class="form-control" name="name_cat" placeholder="Name of the Category" required>
                    </div><br>  
            <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Submit </button>
   
                </form>
      </div>

    </div>
  </div>
</div>
 

        
<!-- Modal for editing adding new category -->
<div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabelcat" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-globe"></i> Edit Website Category</h4>
      </div>
      <div class="modal-body">
          <br>
           <div id="edit_modal_category"></div>
      </div>

    </div>
  </div>
</div>
      
        
<!-- Modal for website adding -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-globe"></i> Add Website</h4>
      </div>
      <div class="modal-body">
          <br>
                <form name="web_form" action="website_process.php?aim=content&action=add" method="POST" class="web_form_class" role="form" >
                    <input name="genre_id" type="hidden" value="1"/>
                     <input name="header_loc" type="hidden" value="websites.php"/>
                     <input type="hidden" name="cat_id" id="bookId" value=""/>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text"  autocomplete="off" name="web_name" class="form-control" placeholder="Google" onchange="validate()" novalidate><br><span style="color:red" id="err_name"></span>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                        <input type="text"  autocomplete="off" name="web_link" class="form-control" placeholder="https://www.google.com" onchange="validate()" novalidate><br><span style="color:red" id="err_link"></span>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                        <textarea type="text" autocomplete="off" onchange="validate()" name="web_cont" class="form-control" novalidate></textarea><br><span style="color:red" id="err_text"></span>
                    </div>   
                    <br>  
            <button type="button" onclick="should_submit()" class="btn btn-primary"><i class="fa fa-share"></i> Submit </button>
   
              </form>
          
      </div>
     
    </div>
  </div>
</div>
          

<!-- Modal for  Editing website adding -->
<div class="modal fade" id="editcont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-globe"></i> Edit Website</h4>
      </div>
      <div class="modal-body">
          <br>
               <div id="edit_modal_content"></div>  
          
      </div>
     
    </div>
  </div>
</div>
        
        
  <!-------------Scripts----------------->
  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/jquery.searchable.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.lazyload.js"></script>
  <script>
$(function () {
<?php 
$j=0;
while($j<=$i){
?>
    $( "<?php echo '#searchable-container'.$j;?>" ).searchable({
        searchField: "<?php echo '#container-search'.$j;?>",
        selector: '.search',
        childSelector: '.abc',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
            })
    <?php
             $j++;}
    ?>
        });  
      
      //FOR LAZY LOAD
      $("img.lazy").lazyload();
      
      
      //For fetching the id of category(from genre_to_category) to modal for adding content
      $(document).on("click", ".open-AddBookDialog", function () {
     var Id = $(this).data('id');
     $(".modal-body #bookId").val( Id );
});     
  </script>   
<script src="js/custom.js"></script>
<script type="text/javascript">
    function ActionFunction(url, id, action) {

        if (action == "edit_category") {

            var divcontainer = $('#edit_modal_category');

            divcontainer.empty();
            divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');

            divcontainer.slideDown('slow', function () {
                //change the value of g_id(genre_id)
                divcontainer.load(url + '&id=' + id + '&g_id=1&loc=websites.php&sid=' + Math.random());
            });

        }
        
           else if (action == "edit_content") {

            var divcontainer = $('#edit_modal_content');

            divcontainer.empty();
            divcontainer.html('<div style="float:left; margin-left:5px; width:400px; height:250px;"><img src="loading.gif" /></div>');

            divcontainer.slideDown('slow', function () {
                divcontainer.load(url + '&content_id=' + id + '&loc=websites.php&sid=' + Math.random());
            });

        }

    }
    
//validation
    function validate() {
    var is_valid=true;    
    var a = document.forms["web_form"]["web_name"].value;
    var b = document.forms["web_form"]["web_link"].value;
    var c = document.forms["web_form"]["web_cont"].value;
    if (a == null || a == "") {
        $("#err_name").html('<i>Website name cannot be blank</i>');
        is_valid=false;
    }
     else{
            $("#err_name").html("");
        }
        if (b == null || b == "") {
        $("#err_link").html('<i>Web Link cannot be blank</i>');
        is_valid=false;
    }
     else{
            $("#err_link").html("");
        }
        if (c == null || c == "") {
        $("#err_text").html('<i>Description cannot be blank</i>');
        is_valid=false;
    }
     else{
            $("#err_text").html("");
         }
        
return is_valid;
    }
  
        
        
    function should_submit(){
        if(validate()){
            $('.web_form_class').submit();
        }
    }
</script>
        
    <body>
</html>
