<?php 
session_start();
if (!isset($_SESSION['LAST_ACTIVITY_step1']) || (time() -   $_SESSION['LAST_ACTIVITY_step1'] > 900000)) {
session_destroy();
session_unset();
header("Location: destroy.php");
}
 $_SESSION['LAST_ACTIVITY_step1'] = time(); // the start of the session.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Command Centre</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Follow this documentation to edit your FREE Business Bootstrap theme with easy follow instructions.">
	<meta name="keywords" content="Responsive Bootstrap theme, bootstrap documentation, editing logo, editing slider, changing backgrounds, editing tabs, editing carousel, setting up bootstrap contact form, ">
    <meta name="author" content="Html5TemplatesDreamweaver">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a style="color:white;" class="brand" href="../websites.php">COMMAND CENTRE</a>
        </div>
      </div>
    </div>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
  
   
    <center><h3>PHP</h3></center>
  </div>
</header>

  <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          
          <li><a href="#db"><i class="icon-chevron-right"></i> DB Connection</a></li>          
          <li><a href="#select"><i class="icon-chevron-right"></i>Select query </a></li>
          <li><a href="#insert"><i class="icon-chevron-right"></i>Insert & Update</a></li>
          <li><a href="#history"><i class="icon-chevron-right"></i>History table updation</a></li>          
          <li><a href="#sanatize"><i class="icon-chevron-right"></i> Sanatize Form Values</a></li>
		  <li><a href="#validate"><i class="icon-chevron-right"></i>Server-side Form Validation</a></li>
          <li><a href="#explode"><i class="icon-chevron-right"></i>Explode Values</a></li>		  
        </ul>
      </div>
      <div class="span9">




        
        
        <section id="db">
        
        
            <h1>DB Connection</h1>
            
            <p>This is the code which in saved in a connection.php file and is included on every page of project which requires db access</p>
        
            
<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1
2
3
4
5</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>
<span style="color: #888888">//connection:</span>
<span style="color: #996633">$link</span> <span style="color: #333333">=</span> <span style="color: #007020">mysqli_connect</span>(<span style="background-color: #fff0f0">&quot;localhost&quot;</span>,<span style="background-color: #fff0f0">&quot;root&quot;</span>,<span style="background-color: #fff0f0">&quot;pswrd&quot;</span>,<span style="background-color: #fff0f0">&quot;db_name&quot;</span>) <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(<span style="background-color: #fff0f0">&quot;Error &quot;</span> <span style="color: #333333">.</span> mysqli_error(<span style="color: #996633">$link</span>));
<span style="color: #888888">//echo &quot;Connection OK&quot;;</span>
<span style="color: #557799">?&gt;</span>
</pre></td></tr></table></div>
        
        
        </section>
        
        
        <hr class="bs-docs-separator">
        
        
        <section id="select">
        
        
            <h1>Select Query</h1>
            
            <p>The select query is used to select table from the db, so the connection file should be included. </p>
            
<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>

<span style="color: #996633">$sql</span> <span style="color: #333333">=</span> mysqli_query(<span style="color: #996633">$link</span>, <span style="background-color: #fff0f0">&quot;Select * FROM `table_name` WHERE `player_id`= &#39;</span><span style="background-color: #eeeeee">$id</span><span style="background-color: #fff0f0">&#39; &quot;</span>) <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(mysqli_error(<span style="color: #996633">$link</span>));
<span style="color: #996633">$row</span><span style="color: #333333">=</span> mysqli_fetch_array(<span style="color: #996633">$sql</span>, MYSQLI_BOTH);
<span style="color: #996633">$coach_id</span> <span style="color: #333333">=</span> <span style="color: #996633">$row</span>[<span style="background-color: #fff0f0">&#39;coach_id&#39;</span>];

<span style="color: #557799">?&gt;</span>
</pre></div>


        
        </section>
        
        
        <hr class="bs-docs-separator">
        
        
        <section id="insert">
        
        
            <h1>Insert and Update query</h1>
            
            <p>Code for insertion and updation</p>
            
<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>
<span style="color: #888888">//Insertion</span>

mysqli_query(<span style="color: #996633">$link</span>, <span style="background-color: #fff0f0">&quot;INSERT INTO table_name( column1_name, column2_name, date_modified )</span>
<span style="background-color: #fff0f0">VALUES(&#39;</span><span style="background-color: #eeeeee">$column1_name_value</span><span style="background-color: #fff0f0">&#39;, &#39;</span><span style="background-color: #eeeeee">$column2_name_value</span><span style="background-color: #fff0f0">&#39;, Now() )&quot;</span>) <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(<span style="background-color: #fff0f0">&quot;Error &quot;</span> <span style="color: #333333">.</span> mysqli_error(<span style="color: #996633">$link</span>));

<span style="color: #888888">//Updation</span>

<span style="color: #996633">$query</span> <span style="color: #333333">=</span> <span style="background-color: #fff0f0">&quot;Update table_name set `column1_name` = &#39;&quot;</span> <span style="color: #333333">.</span><span style="color: #996633">$column1_value</span><span style="color: #333333">.</span> <span style="background-color: #fff0f0">&quot;&#39;, `column2_name` = &#39;&quot;</span> <span style="color: #333333">.</span><span style="color: #996633">$column2_value</span><span style="color: #333333">.</span> <span style="background-color: #fff0f0">&quot;&#39;, `date_modified` = Now() Where `coach_id`=&#39;&quot;</span><span style="color: #333333">.</span><span style="color: #996633">$empid</span><span style="color: #333333">.</span><span style="background-color: #fff0f0">&quot;&#39; &quot;</span> <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(mysqli_error(<span style="color: #996633">$link</span>));
<span style="color: #996633">$sql</span> <span style="color: #333333">=</span> mysqli_query(<span style="color: #996633">$link</span>, <span style="color: #996633">$query</span>) <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(mysqli_error(<span style="color: #996633">$link</span>));


<span style="color: #557799">?&gt;</span>
</pre></div>

   
       
        </section>
        
        
        <hr class="bs-docs-separator">
        
        
        <section id="history">
        
        
            <h1>Updating History Table</h1>
            
            <p>This is how we can update the history log table each time some operation is performed</p>
<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>

<span style="color: #996633">$pf3_id</span> <span style="color: #333333">=</span> mysqli_insert_id(<span style="color: #996633">$link</span>); <span style="color: #888888">// This is to store primary key value of the last insertion</span>
<span style="color: #888888">//Insertion is history table</span>
<span style="color: #996633">$table_name</span><span style="color: #333333">=</span><span style="background-color: #fff0f0">&quot;coach_to_proficiency&quot;</span>;
<span style="color: #996633">$column_name</span><span style="color: #333333">=</span><span style="background-color: #fff0f0">&quot;proficiency_type_id&quot;</span>;
<span style="color: #996633">$new_value</span><span style="color: #333333">=</span><span style="color: #996633">$prof3</span>;
mysqli_query(<span style="color: #996633">$link</span>, <span style="background-color: #fff0f0">&quot;INSERT INTO history_table(table_name, row_id, column_name, new_value, changed_by, date_added ) VALUES(&#39;</span><span style="background-color: #eeeeee">$table_name</span><span style="background-color: #fff0f0">&#39;,  &#39;</span><span style="background-color: #eeeeee">$pf3_id</span><span style="background-color: #fff0f0">&#39;, &#39;</span><span style="background-color: #eeeeee">$column_name</span><span style="background-color: #fff0f0">&#39;, &#39;</span><span style="background-color: #eeeeee">$new_value</span><span style="background-color: #fff0f0">&#39;, &#39;</span><span style="background-color: #eeeeee">$c_id</span><span style="background-color: #fff0f0">&#39;, Now() )&quot;</span>) <span style="color: #008800; font-weight: bold">or</span> <span style="color: #008800; font-weight: bold">die</span>(<span style="background-color: #fff0f0">&quot;Error &quot;</span> <span style="color: #333333">.</span> mysqli_error(<span style="color: #996633">$link</span>));
    
<span style="color: #557799">?&gt;</span>
</pre></div>


	
        </section>
        
        
        <hr class="bs-docs-separator">                
        
        
        <section id="sanatize">
        
        
            <h1>Function to sanatize form values</h1>
            
           <p>This code helps against sql injection.</p>
             
               <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>
    
<span style="color: #888888">//Function to sanitize values received from the form. Prevents SQL injection</span>
<span style="color: #008800; font-weight: bold">function</span> <span style="color: #0066BB; font-weight: bold">clean</span>(<span style="color: #996633">$str</span>) {    
<span style="color: #008800; font-weight: bold">include</span> <span style="background-color: #fff0f0">&#39;connection.php&#39;</span>; <span style="color: #888888">// This is necessary</span>
<span style="color: #996633">$str</span> <span style="color: #333333">=</span> <span style="color: #333333">@</span>trim(<span style="color: #996633">$str</span>);
<span style="color: #008800; font-weight: bold">if</span>(<span style="color: #007020">get_magic_quotes_gpc</span>()) {
<span style="color: #996633">$str</span> <span style="color: #333333">=</span> <span style="color: #007020">stripslashes</span>(<span style="color: #996633">$str</span>);
}
<span style="color: #008800; font-weight: bold">return</span> mysqli_real_escape_string(<span style="color: #996633">$link</span>, <span style="color: #996633">$str</span>);
}
<span style="color: #996633">$nc</span> <span style="color: #333333">=</span> clean(<span style="color: #996633">$_POST</span>[<span style="background-color: #fff0f0">&#39;name&#39;</span>]);
    
<span style="color: #557799">?&gt;</span>
</pre></div>

        </section>
		
		
		<hr class="bs-docs-separator">
        
        
        <section id="validate">
        
        
            <h1>Server-side Form Validation</h1>
            
           <p>This codes helps to validate that the form is completely filled.</p>		  

          <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%">// Below code is pasted where the form values are recieved afetr submission

<span style="color: #557799">&lt;?php</span>

<span style="color: #888888">//Array to store validation errors</span>
<span style="color: #996633">$errmsg_arr</span> <span style="color: #333333">=</span> <span style="color: #008800; font-weight: bold">array</span>();
     
<span style="color: #888888">//Validation error flag</span>
<span style="color: #996633">$errflag</span> <span style="color: #333333">=</span> <span style="color: #008800; font-weight: bold">false</span>;

<span style="color: #888888">//Input Validations</span>
<span style="color: #008800; font-weight: bold">if</span>(<span style="color: #996633">$nc</span> <span style="color: #333333">==</span> <span style="background-color: #fff0f0">&#39;&#39;</span>  ) {
<span style="color: #996633">$errmsg_arr</span>[] <span style="color: #333333">=</span> <span style="background-color: #fff0f0">&#39;Please enter all the * marked fields to add synopsis a&#39;</span>;
<span style="color: #996633">$errflag</span> <span style="color: #333333">=</span> <span style="color: #008800; font-weight: bold">true</span>;
}
<span style="color: #008800; font-weight: bold">if</span>(<span style="color: #996633">$date</span> <span style="color: #333333">==</span> <span style="background-color: #fff0f0">&#39;&#39;</span> ) {
<span style="color: #996633">$errmsg_arr</span>[] <span style="color: #333333">=</span> <span style="background-color: #fff0f0">&#39;Please enter all the * marked fields to add synopsis b&#39;</span>;
<span style="color: #996633">$errflag</span> <span style="color: #333333">=</span> <span style="color: #008800; font-weight: bold">true</span>;
}
 
<span style="color: #888888">//If there are input validations, redirect back to the login form</span>
<span style="color: #008800; font-weight: bold">if</span>(<span style="color: #996633">$errflag</span>) {
<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>] <span style="color: #333333">=</span> <span style="color: #996633">$errmsg_arr</span>;
<span style="color: #007020">session_write_close</span>();
header(<span style="background-color: #fff0f0">&quot;location: addcerti.php&quot;</span>); <span style="color: #888888">// The page where you want to show error</span>
<span style="color: #008800; font-weight: bold">exit</span>();
}

<span style="color: #557799">?&gt;</span>

// Below code is to be pasted in addcerti.php where error is to be shown 

<span style="color: #557799">&lt;?php</span>
<span style="color: #008800; font-weight: bold">if</span>( <span style="color: #007020">isset</span>(<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>]) <span style="color: #333333">&amp;&amp;</span> <span style="color: #007020">is_array</span>(<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>]) <span style="color: #333333">&amp;&amp;</span> <span style="color: #007020">count</span>(<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>]) <span style="color: #333333">&gt;</span><span style="color: #0000DD; font-weight: bold">0</span> ) {
   
<span style="color: #008800; font-weight: bold">foreach</span>(<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>] <span style="color: #008800; font-weight: bold">as</span> <span style="color: #996633">$msg</span>) {
<span style="color: #008800; font-weight: bold">echo</span> <span style="background-color: #fff0f0">&#39;&lt;center&gt;&lt;br&gt;&lt;p style=&quot;color:red;&quot; &gt;&lt;strong&gt;&#39;</span>,<span style="color: #996633">$msg</span>,<span style="background-color: #fff0f0">&#39;&lt;/strong&gt;&lt;/p&gt;&lt;/center&gt;&#39;</span>;
}
  
<span style="color: #007020">unset</span>(<span style="color: #996633">$_SESSION</span>[<span style="background-color: #fff0f0">&#39;ERRMSG_ARR&#39;</span>]);
}
<span style="color: #557799">?&gt;</span>
</pre></div>

	 
        </section>		


<hr class="bs-docs-separator">		


<section id="explode">
        
        
            <h1>Explode Values</h1>
            
            <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #557799">&lt;?php</span>

<span style="color: #996633">$name1</span> <span style="color: #333333">=</span> <span style="color: #007020">explode</span>(<span style="background-color: #fff0f0">&quot; &quot;</span>, <span style="color: #996633">$_POST</span>[<span style="background-color: #fff0f0">&#39;name&#39;</span>] ); 
<span style="color: #996633">$f_name</span> <span style="color: #333333">=</span> <span style="color: #996633">$name1</span>[<span style="color: #0000DD; font-weight: bold">0</span>];
<span style="color: #996633">$l_name</span> <span style="color: #333333">=</span> <span style="color: #996633">$name1</span>[<span style="color: #0000DD; font-weight: bold">1</span>];

<span style="color: #557799">?&gt;</span>
</pre></div>
                                
    	
	 
       
		

      </div>
    </div>

  </div>



    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <p>Command Center</p>
        <p>Designed by <a href="http://www.bhupindersingh.in">Bhupinder Singh</a></p>
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>



  </body>
</html>
