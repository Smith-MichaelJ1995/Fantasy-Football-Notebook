<?php //include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php"; 
	
	//Create object Contact_Map
	$nflPlayers = new Backend();
	
	//work on sending email
	$to = "michaeljoshuasmith1@gmail.com";
	$subject = "Draft List: ". date("M d Y");
	$txt = '
	<html>
		<head>
		<title>HTML email</title>
		<style>
			
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
		
		</style>
		</head>
		<body>
			<h1>Ordered By Projected Draft Round Selection:</h1>
			<table style="border: 1px solid #000;">
				<thead>
				  <tr>
					<th>Name</th>
					<th>Position</th>
					<th>Team</th>
					<th>Age</th>
					<th>Date Of Article</th>
					<th>Projected Draft Rnd</th>
					<th>Injury Prone <br> (1 - 10 = likely)</th>
					<th>News Source</th>
				  </tr>
			   </thead>
			   <tbody>
					'.$nflPlayers->returnDraftRecords().'
			   </tbody>
			</table>
			<br>
		</body>
	</html>';
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: testsender1995@gmail.com" . "\r\n";

	if(mail($to,$subject,$txt,$headers))
	{	
	}
	else
	{
		echo 'FAIL';
	}
	
?>
<div class="container">
  <!-- Content here -->
  <h2><i>An email has been sent to michaeljoshuasmith1@gmail.com containing the current state of the research board, <a href="http://localhost/FantasyFootballDraft/php/updateDB.php" style="color: red;">click here</a> to download the current state of the database for your records..</i></h2>
  
  
</div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/footer.php";?>