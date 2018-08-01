<?php
    //create class object
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/class/Backend.php"; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>FFB Notebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" 
      type="image/png" 
      href="https://nflops.blob.core.windows.net/cachenflops-lb/c/c/1/2/0/7/cc120774df6d77435947fe108906141b7472106d.jpg">
  <!-- Core Bootstrap CSS 4.1--> 
  <link rel="stylesheet" type="text/css" href="http://localhost/FantasyFootballDraft/css/bootstrap.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="http://localhost/FantasyFootballDraft/css/freelancer.css">
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	  <button style="margin: 1%;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mx-auto">
		  <li class="nav-item">
			<a class="nav-link" style="color: #fff;" href="http://localhost/FantasyFootballDraft/">Draft Data</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" style="color: #fff;" href="http://localhost/FantasyFootballDraft/php/insert.php">
			  Insert Player
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" style="color: #fff;" href="http://localhost/FantasyFootballDraft/php/emailList.php">
			  Email List
			</a>
		  </li>
		</ul>
		<!--<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>-->
	  </div>
	</nav>
	
	
	<div class="row">
			<div class="col-lg-12" align="center" style="margin-top: 1%; margin-bottom: 0%;">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTon7rQB8vihOY6fw-0P7VTGmvJa1DV1KuAXaLbm5rHn7_LAEzg" class="mx-auto">
			</div>
	</div>