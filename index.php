<?php
//PHP Actions
include("functions.php");

//delete miner config
if($_GET[action] == "del") {

	unlink("conf/active_".$_GET[conf]);
	unlink("conf/".$_GET[conf]);
	Header("Location: index.php");
}

//kill all running bfgminers
if($_GET[action] == "stop"){
	killAllMiners();
}

$confArray = getAllConfigs();
?>
<html>
<head>
<title>Gridseed Blade Webinterface</title>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
</head>
<body class="homepage">

		<!-- Header Wrapper -->
			<div class="wrapper style1">
			
			<!-- Header -->
				<div id="header">
					<div class="container">
							
						<!-- Logo -->
							<h1><a href="#" id="logo">Gridseed-Blade webinterface</a></h1>
						
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="active"><a href="index.php?do=home">Home</a></li>
									<li><a href="index.php?do=switch">switch pool</a></li>
									<li><a href="index.php?do=add&action=add">add new miner</a></li>
									<li><a href="index.php?do=home&action=stop">stop miner</a></li>
									<li><a href="miner.php?ref=10&pg=Stats" target="_blank">Logger</a></li>
								</ul>
							</nav>
	
					</div>
				</div>
				
			

			</div>
		
		<!-- Section One -->
			<div class="wrapper style2">
				<section class="container">
				
							
							<span class="byline">
							<?php
							
								if($_GET["do"] == "") { $_GET["do"] = "home"; }
								include($_GET["do"].".php");
							
							?>
							</span>
							
						
						
					
				</section>
			</div>


	<!-- Footer -->
		<div id="footer">
			
			
			<!-- Copyright -->
				<div id="copyright">
					<header class="major">
					<h2>If you like it, donate:</h2>
					<span class="byline">BTCAddress: 174jGsoMgUeRK7U3yUfbKRip1h6mwwuFpw</span>
				</header>
				</div>			
		</div>

	</body>

</html>
