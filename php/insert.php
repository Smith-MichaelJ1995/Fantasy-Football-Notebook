<?php 
	//include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php";
	
	//Create object Contact_Map
	$nflPlayers = new Backend();
	
	//check for submit
	if(isset($_POST['submit']))
	{
		//render imput
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
		
		//insert records to database
		$nflPlayers->insertRecord($name, $position, $team, $age, $dateofarticle, $projdraftround, $injsus, $href, $newssrc, $notes);
         
		/*if (new DateTime() > new DateTime("2018-05-16")) {
			echo 'It works';
		}*/
 	
	}

?>

<div class="container">

	<h2 style="margin: 1%;" align="center"><i>Enter a new player..</i></h2>
	
  <!-- Content here -->
	  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin: 1%;">
		  <div class="form-group">
			<label for="name"><h6>Name:</h6></label>
			<input type="text" class="form-control" id="name" name="name">
		  </div>
		  <div class="form-group">
			<label for="pwd"><h6>Position:</h6></label>
				<select required name="position" class="form-control">
								<option>QB</option>
								<option>RB</option>
								<option>WR</option>
								<option>TE</option>
								<option>K</option>
								<option>DEF</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="email"><h6>Team:</h6></label>
			<select required name="team" class="form-control">
					<option>ARI</option>
					<option>ATL</option>
					<option>BAL</option>
					<option>BUF</option>
					<option>CAR</option>
					<option>CHI</option>
					<option>CIN</option>
					<option>CLE</option>
					<option>DAL</option>
					<option>DEN</option>
					<option>DET</option>
					<option>GB</option>
					<option>HOU</option>
					<option>IND</option>
					<option>JAX</option>
					<option>KC</option>
					<option>LAC</option>
					<option>LAR</option>
					<option>MIA</option>
					<option>MIN</option>
					<option>NE</option>
					<option>NO</option>
					<option>NYG</option>
					<option>NYJ</option>
					<option>OAK</option>
					<option>PHI</option>
					<option>PIT</option>
					<option>SEA</option>
					<option>SF</option>
					<option>TB</option>
					<option>TEN</option>
					<option>WAS</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Age:</h6></label>
			<input type="text" class="form-control" id="age" name="age">
		  </div>
		  <div class="form-group">
			<label for="article"><h6>Date Of Article:</h6></label>
			<input type="text" class="form-control" id="dateofarticle" name="dateofarticle">
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Projected Draft Round:</h6></label>
			<input type="text" class="form-control" id="projdraftround" name="projdraftround">
		  </div>
		  <div class="form-group">
			<label for="email"><h6>Injury Prone (1 - 10 = likely):</h6></label>
				<select required name="injsus" class="form-control">
					<option>N/A</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
		  </div>
		  <div class="form-group">
			<label for="age"><h6>Article Link:</h6></label>
			<input type="text" class="form-control" id="href" name="href">
		  </div>
		  <div class="form-group">
			<label for="email"><h6>News Source:</h6></label>
			<input type="text" class="form-control" id="newssrc" name="newssrc">
		  </div>
		  <div class="form-group">
			<label><h6>Additional Notes:</h6></label>
			<textarea required name="notes" placeholder="Important information about this player" class="form-control"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Submit</button>
	</form>
	  
  
</div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/footer.php";?>