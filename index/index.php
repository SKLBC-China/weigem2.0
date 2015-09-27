<?php
$fromusername = $_GET['fromusername'];

echo"
 <!-- FlatFy Theme - Andrea Galanti /-->
<!doctype html>
<!--[if lt IE 7]> <html class=\"no-js ie6 oldie\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js ie7 oldie\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js ie8 oldie\" lang=\"en\"> <![endif]-->
<!--[if IE 9]>    <html class=\"no-js ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0\">
    <meta name=\"description\" content=\"Flatfy Free Flat and Responsive HTML5 Template \">
    <meta name=\"author\" content=\"\">

    <title>WEiGEM 2.0 search engine</title>

    <!-- Bootstrap core CSS -->
    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
 
    <!-- Custom Google Web Font -->
    <link href=\"font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href=\"css/general.css\" rel=\"stylesheet\">
	
	 <!-- Owl-Carousel -->
    <link href=\"css/custom.css\" rel=\"stylesheet\">
	<link href=\"css/owl.carousel.css\" rel=\"stylesheet\">
    <link href=\"css/owl.theme.css\" rel=\"stylesheet\">
	<link href=\"css/style.css\" rel=\"stylesheet\">
	<link href=\"css/animate.css\" rel=\"stylesheet\">
	
	<!-- Magnific Popup core CSS file -->
	<link rel=\"stylesheet\" href=\"css/magnific-popup.css\"> 
	
	<script src=\"js/modernizr-2.6.2.min.js\"></script>  <!-- Modernizr /-->
	<script src=\"js/PIE_IE9.js\"></script>  
	<script src=\"js/PIE_IE678.js\"></script>  
	
	<!--[if lt IE 9]>
		<script src=\"js/html5shiv.js\"></script>
	<![endif]-->

</head>

<body id=\"home\">


	
	<!-- FullScreen -->
    <div style=\"padding:0px\"class=\"intro-header\">
		<div class=\"col-xs-12 text-center abcen1\">
			<h1 class=\"h2_home wow \" >WEiGEM 2.0+</h1>
			<h3 class=\"h3_home wow \" >bio-brick search engine</h3>
			</br>
			<form role=\"form\" action=\"../result/index.php\" method=\"get\" >
				<div class=\"col-md-6\">
					<div class=\"form-group\">
						<label for=\"InputName\">QUICK SEARCH</label>
						<div class=\"input-group\">
							<input type=\"text\" class=\"form-control\" name=\"keyword\" id=\"InputName\" placeholder=\"Enter keyword\">
							<input type=\"hidden\" value=\"$fromusername\" name=\"fromusername\">
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					<input type=\"submit\"  id=\"submit\" value=\"search for biobrick >\" class=\"btn wow tada btn-embossed btn-primary pull-right\">
				
				</div>
			</form>
		</div>    
        <!-- /.container -->
		<div class=\"col-xs-12 text-center abcen wow fadeIn\">
			<div class=\"button_down \"> 
				<a class=\"imgcircle wow bounceInUp\" data-wow-duration=\"1.5s\"  href=\"#whatis\"> <img class=\"img_scroll\" src=\"img/icon/circle.png\" alt=\"\"> </a>
			</div>
		</div>
    </div>
	
	
	<!-- Contact -->
	<div id=\"contact\" style=\"padding:0px\" class=\"content-section-a\">
		<div class=\"container\">
			<div class=\"row\">
			
			<div class=\"col-md-6 col-md-offset-3 text-center wrap_title\">
				<h2 style=\"font-size:50px\">Advanved search</h2>
			</div>
			
			<form role=\"form\" action=\"../result/advanced.php\" method=\"get\" >
				
				<div class=\"col-md-6\">
					<input type=\"hidden\" value=\"$fromusername\" name=\"fromusername\">
					
					<div class=\"form-group\">
						<div class=\"input-group\" style=\"\">
						<label for=\"InputName\">Description</label>
							<input style=\"width:60%\"type=\"text\" class=\"form-control\" name=\"desc\"  placeholder=\"Enter Description\" >
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					
					<div class=\"form-group\">
						<div class=\"input-group\" style=\"\">
						<label for=\"InputName\">Part_Name</label>
							<input style=\"width:60%\"type=\"text\" class=\"form-control\" name=\"partname\"  placeholder=\"Enter Name\" >
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					
					<div class=\"form-group\">
						
						<div class=\"input-group\">
						<label for=\"InputEmail\">Creation_date</label>
							<input style=\"width:60%\"type=\"text\" class=\"form-control\" id=\"InputEmail\" name=\"creationdate\" placeholder=\"Enter create dade\" >
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
							
						</div>
					</div>
					
					<div class=\"form-group\">
						
						<div class=\"input-group\">
						<label for=\"InputEmail\">Part_type</label>
							<select style=\"width:50%;height: 42px; float:right;\" name=\"parttype\">
							<option value=\"\">All</option>
							<option>Basic</option>
<option>Cell</option>
<option>Coding</option>
<option>Composite</option>
<option>Conjugation</option>
<option>Device</option>
<option>DNA</option>
<option>Generator</option>
<option>Intermediate</option>
<option>Inverter</option>
<option>Plasmid</option>
<option>Plasmid_Backbone</option>
<option>Primer</option>
<option>Project</option>
<option>Protein_Domain</option>
<option>RBS</option>
<option>Regulatory</option>
<option>Reporter</option>
<option>RNA</option>
<option>Signalling</option>
<option>T7</option>
<option>Tag</option>
<option>Temporary</option>
<option>Terminator</option>
<option>Translational_Unit</option>
							</select>
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					
					<div class=\"form-group\">
						
						<div class=\"input-group\">
						<label for=\"InputEmail\">Results</label>
							<select style=\"width:50%;height: 42px; float:right;\" name=\"results\">
							<option value=\"\">All</option>
							<option>Works</option>
							<option>Issues</option>>
							</select>
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					
					<div class=\"form-group\">
						
						<div class=\"input-group\">
						<label for=\"InputEmail\">Status</label>
							<select style=\"width:50%;height: 42px; float:right;\" name=\"status\">
							<option value=\"\">All</option>
							<option>Available</option>
							<option>Planning</option>
							<option>Informational</option>
							<option>Unavailable</option>
							<option>Missing</option>
							</select>
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
						</div>
					</div>
					
					<div class=\"form-group\">
						
						<div class=\"input-group\">
						<label for=\"InputEmail\">Author</label>
							<input style=\"width:60%\"type=\"text\" class=\"form-control\" id=\"InputEmail\" name=\"author\" placeholder=\"Enter author name\" >
							<span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-ok form-control-feedback\"></i></span>
							
						</div>
					</div>
					<span style=\"font-size:0.7em\">*You do not need to input every input bar, just choose those you need</span>

					<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Search for bio-brick\" class=\"btn wow tada btn-embossed btn-primary pull-right\">
				</div>
			</form>
			
			
		</div>
	</div>
	
	
	
    <footer>
      <div class=\"container\">
        <div class=\"row\">
         
            <h3 class=\"footer-title\">SKLBC-China</h3>
            
          </div> <!-- /col-xs-7 -->
        </div>

    </footer>

    <!-- JavaScript -->
    <script src=\"js/jquery-1.10.2.js\"></script>
    <script src=\"js/bootstrap.js\"></script>
	<script src=\"js/script.js\"></script>

</body>

</html>




"
  


// some code

?>