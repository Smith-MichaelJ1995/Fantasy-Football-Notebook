<?php

	//include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php"; 
   
   //Create object Contact_Map
	$nflPlayers = new Backend();
	
	//check for submit
	if(isset($_POST['submit']))
	{
		
		//render imput
		$id =  htmlspecialchars($_POST['id']);
		$name =  htmlspecialchars($_POST['name']);
		$position = htmlspecialchars($_POST['position']);
		$team = htmlspecialchars($_POST['team']);
		$age = htmlspecialchars($_POST['age']);
		$dateofarticle = htmlspecialchars($_POST['dateofarticle']);
		$projdraftround = htmlspecialchars($_POST['projdraftround']);
		$injsus = htmlspecialchars($_POST['injsus']);
		$href = htmlspecialchars($_POST['href']);
		$newssrc = htmlspecialchars($_POST['newssrc']);
		$notes = htmlspecialchars($_POST['notes']);
		$status = htmlspecialchars($_POST['status']);
		
		//update record for contacted user
		$nflPlayers->updateRecord($id, $name, $position, $team, $age, $dateofarticle, $projdraftround, $injsus, $href, $newssrc, $notes, $status);
		
		//re-direct to page
		header('Location: http://localhost/FantasyFootballDraft/php/post.php?id='.$_POST['id'].'');
		
	}
	
	
	//pull specific ID from page parameter
	$id = $_GET['id'];
	   
	//return contact
	$player = $nflPlayers->returnSpecifiedContact($id);
	
?>

	<div class="container">
			<h1>Edit Player Information: <?php echo $player['name']?> </h1>
			
			 <!-- Content here -->
	  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin: 1%;">
		  <div class="form-group">
			<label for="name"><h6>Name:</h6></label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $player['name'] ?>">
		  </div>
		  <div class="form-group">
			<label for="pwd"><h6>Position:</h6></label>
				<select required name="position" class="form-control">
								<option <?php echo ($player["position"] === "QB")?"selected" : ""; ?> >QB</option>
								<option <?php echo ($player["position"] === "RB")?"selected" : ""; ?> >RB</option>
								<option <?php echo ($player["position"] === "WR")?"selected" : ""; ?> >WR</option>
								<option <?php echo ($player["position"] === "TE")?"selected" : ""; ?> >TE</option>
								<option <?php echo ($player["position"] === "K")?"selected" : ""; ?> >K</option>
								<option <?php echo ($player["position"] === "DEF")?"selected" : ""; ?> >DEF</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="email"><h6>Team:</h6></label>
			<select required name="team" class="form-control">
					<option <?php echo ($player["team"] === "ARI")?"selected" : ""; ?>>ARI</option>
					<option <?php echo ($player["team"] === "ATL")?"selected" : ""; ?>>ATL</option>
					<option <?php echo ($player["team"] === "BAL")?"selected" : ""; ?>>BAL</option>
					<option <?php echo ($player["team"] === "BUF")?"selected" : ""; ?>>BUF</option>
					<option <?php echo ($player["team"] === "CAR")?"selected" : ""; ?>>CAR</option>
					<option <?php echo ($player["team"] === "CHI")?"selected" : ""; ?>>CHI</option>
					<option <?php echo ($player["team"] === "CIN")?"selected" : ""; ?>>CIN</option>
					<option <?php echo ($player["team"] === "CLE")?"selected" : ""; ?>>CLE</option>
					<option <?php echo ($player["team"] === "DAL")?"selected" : ""; ?>>DAL</option>
					<option <?php echo ($player["team"] === "DEN")?"selected" : ""; ?>>DEN</option>
					<option <?php echo ($player["team"] === "DET")?"selected" : ""; ?>>DET</option>
					<option <?php echo ($player["team"] === "GB")?"selected" : ""; ?>>GB</option>
					<option <?php echo ($player["team"] === "HOU")?"selected" : ""; ?>>HOU</option>
					<option <?php echo ($player["team"] === "IND")?"selected" : ""; ?>>IND</option>
					<option <?php echo ($player["team"] === "JAX")?"selected" : ""; ?>>JAX</option>
					<option <?php echo ($player["team"] === "KC")?"selected" : ""; ?>>KC</option>
					<option <?php echo ($player["team"] === "LAC")?"selected" : ""; ?>>LAC</option>
					<option <?php echo ($player["team"] === "LAR")?"selected" : ""; ?>>LAR</option>
					<option <?php echo ($player["team"] === "MIA")?"selected" : ""; ?>>MIA</option>
					<option <?php echo ($player["team"] === "MIN")?"selected" : ""; ?>>MIN</option>
					<option <?php echo ($player["team"] === "NE")?"selected" : ""; ?>>NE</option>
					<option <?php echo ($player["team"] === "NO")?"selected" : ""; ?>>NO</option>
					<option <?php echo ($player["team"] === "NYG")?"selected" : ""; ?>>NYG</option>
					<option <?php echo ($player["team"] === "NYJ")?"selected" : ""; ?>>NYJ</option>
					<option <?php echo ($player["team"] === "OAK")?"selected" : ""; ?>>OAK</option>
					<option <?php echo ($player["team"] === "PHI")?"selected" : ""; ?>>PHI</option>
					<option <?php echo ($player["team"] === "PIT")?"selected" : ""; ?>>PIT</option>
					<option <?php echo ($player["team"] === "SEA")?"selected" : ""; ?>>SEA</option>
					<option <?php echo ($player["team"] === "SF")?"selected" : ""; ?>>SF</option>
					<option <?php echo ($player["team"] === "TB")?"selected" : ""; ?>>TB</option>
					<option <?php echo ($player["team"] === "TEN")?"selected" : ""; ?>>TEN</option>
					<option <?php echo ($player["team"] === "WAS")?"selected" : ""; ?>>WAS</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Age:</h6></label>
			<input type="text" class="form-control" id="age" name="age" value="<?php echo $player['age'] ?>">
		  </div>
		  <div class="form-group">
			<label for="article"><h6>Date Of Article:</h6></label>
			<input type="text" class="form-control" id="dateofarticle" name="dateofarticle" value="<?php echo $player['dateofarticle'] ?>">
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Projected Draft Round:</h6></label>
			<input type="text" class="form-control" id="projdraftround" name="projdraftround" value="<?php echo $player['projdraftround'] ?>">
		  </div>
		  <div class="form-group">
			<label for="email"><h6>Injury Prone (1 - 10 = likely):</h6></label>
				<select required name="injsus" class="form-control">
					<option <?php echo ($player["injsus"] === "N/A")?"selected" : ""; ?>>N/A</option>
					<option <?php echo ($player["injsus"] === "1")?"selected" : ""; ?> >1</option>
					<option <?php echo ($player["injsus"] === "2")?"selected" : ""; ?> >2</option>
					<option <?php echo ($player["injsus"] === "3")?"selected" : ""; ?>>3</option>
					<option <?php echo ($player["injsus"] === "4")?"selected" : ""; ?>>4</option>
					<option <?php echo ($player["injsus"] === "5")?"selected" : ""; ?>>5</option>
					<option <?php echo ($player["injsus"] === "6")?"selected" : ""; ?>>6</option>
					<option <?php echo ($player["injsus"] === "7")?"selected" : ""; ?>>7</option>
					<option <?php echo ($player["injsus"] === "8")?"selected" : ""; ?>>8</option>
					<option <?php echo ($player["injsus"] === "9")?"selected" : ""; ?>>9</option>
					<option <?php echo ($player["injsus"] === "10")?"selected" : ""; ?>>10</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Article Link:</h6></label>
			<input type="text" class="form-control" id="href" name="href" value="<?php echo $player['href'] ?>">
		  </div>
		  <div class="form-group">
			<label for="email"><h6>News Source:</h6></label>
			<input type="text" class="form-control" id="newssrc" name="newssrc" value="<?php echo $player['newssrc'] ?>">
		  </div>
		  <div class="form-group">
			<label for="email"><h6>Draft Status:</h6></label>
				<select required name="status" class="form-control">
					<option <?php echo ($player["status"] === "Available")?"selected" : ""; ?>>Available</option>
					<option <?php echo ($player["status"] === "Drafted")?"selected" : ""; ?>>Drafted</option>
				</select>
		  </div>
		  <div class="form-group">
			<label><h6>Additional Notes:</h6></label>
			<textarea id="notes" required name="notes" class="form-control"><?php echo $player['notes'] ?></textarea>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $player['id'] ?>" class="btn btn-primary">
		  <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Submit</button>
	</form>
	</div>

<!-- javascript to set textarea content -->
<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById("notes").innerHTML = '<?php echo $player['notes'] ?>';
	});
</script>