<? include('config.php'); ?>
<!DOCTYPE html> 
<html lang="en"> 
<head>
	<title>Emmys <?php echo $current_year; ?> ballot</title>
	<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link href="css/bootstrap.css" rel="stylesheet">
  	<!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
 	<link href="css/oscarballot.css" rel="stylesheet" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	

 	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

<?php
if ( $data_source === 'csv' ):
    $data = csv_to_array('data/' . $current_year . '/categories.csv');
    $catData = csv_to_array('data/' . $current_year . '/categories.csv');
    $nomData = csv_to_array('data/' . $current_year . '/nominees.csv');
else:
	require_once 'Connection.class.php';
	$connection = new Connection('featuresupdate','features');
	$sql = 'select * from emmys13_categories';
	$results = mysqli_query($connection->con,$sql);
	while($data[]=mysqli_fetch_array($results));

	## get data for #print
	
	$sql = 'SELECT * FROM emmys13_categories ORDER BY cat_id asc';
	$results = mysqli_query($connection->con,$sql);
	while($catData[]=mysqli_fetch_array($results));
	
	$sql = 'SELECT * FROM emmys13_nominees ORDER BY nom_id asc';
	$results = mysqli_query($connection->con,$sql);
	while($nomData[]=mysqli_fetch_array($results));
endif;
?>

</head>

<body>

	<p class="crit"><?php echo $conf[$current_year]['intro']; ?> Click on any category below, which will lead you to a list of nominees. From there, you can select "Next category" to keep voting. When finished, print out your finished ballot or check back on Emmy night to see how you did!</p>
  
  <div id="container" class="container" style="margin:0px">
      	<div id="header" class="row">  
			<div id="btnNav">
			<ul class="nav nav-pills">
			   <li id="home_btn" class="active"><a href="#">All categories</a></li>
<!--
               <li class="dropdown">
                <a class="dropdown-toggle" id="drop4" role="button" data-toggle="dropdown" href="#">Select a category <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
                <?php
				for ($i = 0; $i < count($data)-1; $i++): ?>
					 <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:getNominees(<?php echo $data[$i]['cat_id'] ?>,'<?php echo $data[$i]['category'] ?>');"><?php echo $data[$i]['category'] ?></a></li>

				<?php endfor; ?>
                </ul>
              </li>
-->
              <li id="nextCat_btn" class="active"><a href="#">Next category</a></li>
              <li id="printview_btn" class="active"><a href="#">See your selections</a></li>
            </ul>
			</div>

			<div id="modcover"></div>
			
    	</div>  
           
		<div id="categories" class="row">
			<div class="span8"> 
				<ul class="endscreen_thumb">
				
				<?php 
					
					for ($i = 0; $i < count($data); $i++) { ?>
					
						<li><a href="javascript: void(0);" alt="<?php echo $data[$i]['category'] ?>" id="<?php echo $data[$i]['cat_id'] ?>" class="catSelect fancyPop" title="<?php echo $data[$i]['category'] ?>" popWidth="804" popHeight="841">
                            <img src="img/<?php echo $current_year; ?>/cat<?php echo $data[$i]['cat_id'] ?>.jpg" />
                            <p class="end_thumb"><?php echo $data[$i]['category'] ?>
                            </p></a></li>
					
					<?php }	?>
	
				</ul>
			</div>
			
		</div> <!-- end "categories" -->
	    
		<div id="nominees" class="span8"></div>
		<div id="results" class="row"></div>
		<div id="compare" class="row"></div>			
		<div id="print" class="row">
		<!-- begin print.php -->
			<div class="closebtn">close [x]</div>
			<h1>Your selections</h2>
			
			<button id="print_me_btn" class="btn">PRINT ME</button>
			
				<?php // CATEGORIES LOOP START
				
					for ($i = 0; $i < count($catData)-1; $i++) {  ?>
			
						<h2><?php echo $catData[$i]['category'] ?></h2>
			
						<?php // NOMINEES LOOP START
						
							for ($j = 0; $j < count($nomData)-1; $j++) { 
								
								if ($nomData[$j]['cat_id'] == $i+1) { ?>
									<p id="<?php echo 'nom'. $nomData[$j]['nom_id'].'p' ?>" > <?php echo $nomData[$j]['first_name'].' '.$nomData[$j]['last_name'].' '.$nomData[$j]['movie'].' ' ?></p>
							
						<?php }
						} // NOMINEES LOOP END ?>
					
			<?php } // CATEGORIES LOOP END ?>
			<!-- end print.php -->
		</div>			

	<div style="clear:both"></div>
	
	<div id="sourceCreds">
	Credits: Programming by Peggy Bustamante and Joe Murphy. Design by Nelson Hsu. Editorial content by Joanne Ostrow and Dave Burdick. All photos courtesy of Getty Images.
	</div>
</div><!-- END container -->

  <!-- Le javascript
    ================================================== -->

    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script src="js/printelement.js"></script>
	<script src="js/vote.js"></script>

    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37303540-1'], ['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>	
</body>
</html>
