<?php 
if(!empty($_GET['sts']) AND $_GET['sts'] == "xzkjsajskaosjoi!9sasjknazshhqs" ) {
$sts = "Successfully Executed" ;
}  
session_start();
if (!isset($_SESSION['LAST_ACTIVITY_step1']) || (time() -   $_SESSION['LAST_ACTIVITY_step1'] > 900000)) {
session_destroy();
session_unset();
header("Location: destroy.php");
}
 $_SESSION['LAST_ACTIVITY_step1'] = time(); // the start of the session.

?>
<html>
<head><title>Command Centre</title><link rel="shortcut icon" href="img/favicon.png"><link href="css/bootstrap.min.css" rel="stylesheet"><link href="css/style.css" rel="stylesheet"><link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"></head>
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
              <li><a href="websites.php"><i class="fa fa-globe"></i> Websites</a></li>
            <li class="active"><a href="colors.php"><i class="fa fa-paint-brush"></i> Colors</a></li>
            <li><a href="typo.php"><i class="fa fa-pencil"></i> Typography</a></li>
            <li><a href="destroy.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">
 Coding</a>
            </li>
          </ul>
          <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
            <li><a href="coding/php.php"><i class="fa fa-code"></i> PHP</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    </div>
     
               
        
      <div class="container">
           <?php if(!empty($sts)){
	?>
<div id="boxalert" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success !</strong> <?php echo $sts; ?>
</div>
<?php }?>
           <Button href="" class="btn btn-default"  type="button" title="Add" data-toggle="modal" data-target="#addcat"><i class="fa fa-paint-brush"></i> Add New Color Category </button>
        
        
  <div class="row">
<br>
    <section id="pinBoot">
<?php 
include 'connection.php';
//Select Query
$i=0;
$sql = mysqli_query($link, "Select * FROM `genre_to_category` WHERE `genre_id`= 2 ") or die(mysqli_error($link));
while($row= mysqli_fetch_array($sql, MYSQLI_BOTH)){
    $id = $row['id'];
    $image = $row['image'];
    $name  = $row['category_name'];
    
?>
      <article class="white-panel"><img src="<?php echo 'img/color_cat/'.$image;?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/>
          <div>
              <br>
              <div class="input-group">
               <input type="search" id="<?php echo 'container-search'.$i; ?>" value="" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button class="open-AddBookDialog btn btn-default" type="button" title="Add" data-toggle="modal" data-id="<?php echo $id; ?>" data-target="#myModal"> Add new </button>
      </span>
    </div><!-- /input-group -->
              <br>
             <div id="<?php echo 'searchable-container'.$i; ?>">
                       <?php
                include 'connection.php';
                $sql1 = mysqli_query( $link , "Select * FROM `category_to_content` WHERE `category_id`= '$id' ") or     die(mysqli_error($link));
                  while( $row1 = mysqli_fetch_array($sql1, MYSQLI_BOTH)){
                      $name = $row1['name_heading'];
                      $link = $row1['link'];
                      $content = $row1['content'];
                  ?>
                 <div class="row row-padding search"> 
                        <div class="col-xs-2"><div style="width:40px;height:40px;background:<?php echo $link; ?>;"></div></div>
                        <div class="col-xs-3 abc" style="padding-top:10px;color:<?php echo $link; ?>"><?php echo $name; ?></div>
                        <div class="col-xs-3 abc" style="padding-top:10px;"><?php echo $link; ?></div>
                        <div class="col-xs-3 abc" style="padding-top:10px;color:grey;font-size:12px;"><button><?php echo $content; ?></button></div>
                    </div>
                  <br>

              <?php 
                  }
               ?>
                  
              </div>
          </div>
      </article>
    

<?php
$i++;
}

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
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-paint-brush"></i> Add New Color Category</h4>
      </div>
      <div class="modal-body">
          <br>
                <form action="col_cat_process.php" method="post" role="form" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                        <input type="file" name="photo" id="fileSelect" />
                    </div><br>
                    
                    <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" class="form-control" name="name_cat" placeholder="Name of the Category" required>
                    </div><br>  
            <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Submit </button> 
              </form>
      </div>
    
    </div>
  </div>
</div>         
          
<!-- Modal for adding colors -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-paint-brush"></i> Add Color</h4>
      </div>
      <div class="modal-body">
          <br>
                <form action="col_cont_process.php" method="POST" role="form" >
               <input type="hidden" name="cat_id" id="bookId" value=""/>     
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                        <input type="text" name="col_name" class="form-control" placeholder="Color name or color family" required>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><strong>#</strong> val</span>
                        <input type="text" name="hash_val" class="form-control" placeholder="#eeeeee" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                        <input type="text" name="tag" class="form-control" placeholder="theme">
                    </div> 
                            <br>  
            <button type="submit" class="btn btn-primary"><i class="fa fa-share"></i> Submit </button>
              </form>
            
      </div>

    </div>
  </div>
</div>
        

        
  <!-------------Scripts----------------->
  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/jquery.searchable.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
      //For fetching the id of category(from genre_to_category) to modal for adding content
      $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});
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
  </script>
  <script src="js/custom.js"></script>


    <body>
</html>
