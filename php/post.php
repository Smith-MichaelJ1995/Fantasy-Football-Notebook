<?php //include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php"; 

   
   //Create object Contact_Map
	$nflPlayers = new Backend();
   
   //check for submit
	if(isset($_POST['delete']))
	{
		
		//Get form data
		$delete_ID = htmlspecialchars($_POST['delete_id']);
		
		$nflPlayers->deleteRecord($delete_ID);
	} 
	else if(isset($_POST['contacted']))
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
		//header('Location: http://localhost/SocialContact/');
		
	}
	

   //pull specific ID from page parameter
   $id = $_GET['id'];
   
   //return contact
   $player = $nflPlayers->returnSpecifiedContact($id);
?>

        <div class="container">
			<div class="row">
				<div class="col-lg-6" style="text-align:left; font-size: 25px;">
				
					<h1><b><?php echo $player['name'];?></b></h1>
							<i>Position:</i> <b style="color: red;"><?php echo $player['position'];?></b> <br>
								   <i>Team:</i> <b style="color: red;"><?php echo $player['team']; ?></b> <br>
								   <i>Age:</i>  <b style="color: red;"><?php echo '<i>'.$player['age'].'</i>'; ?></b> <br>
								   <i>Date Of Article:</i>  <b style="color: red;"><?php echo '<i>'.$player['dateofarticle'].'</i>'; ?></b> <br>
								   <i>Projected Draft Round:</i>  <b style="color: red;"><?php echo $player['projdraftround']; ?></b> <br>
								   <i>Article Links:</i>  <b style="color: red;"><?php echo '<i>'.$player['href'].'</i>'; ?></b> <br>
								   <i>Injury Prone:</i>  <b style="color: red;"><?php echo '<i>'.$player['injsus'].'</i>'; ?></b> <br>
								   <i>Notes:</i>  <b style="color: red;"><?php echo '<i>'.$player['notes'].'</i>'; ?></b> <br>
								   <i>Draft Status:</i>  <b style="color: red;"><?php echo '<i>'.$player['status'].'</i>'; ?></b> <br>
								   <i>Created At:</i>  <b style="color: red;"><?php echo '<i>'.$player['created_at'].'</i>'; ?></b> <br>
								   
				      <br>
						
				 </div>	
				 
				 <!-- ENTER UPDATE STATUS HERE..-->
				 <div class="col-lg-6" style="text-align:left;">
				
					 <form class="pull-right" method="POST" action="<?php echo 'http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'' ?>">
											<label><b>Update Draft Status:</b></label>
											<div class="form-group">
												<select required name="status" class="form-control">
													<option <?php echo ($player["status"] === "Available")?"selected" : ""; ?>>Available</option>
													<option <?php echo ($player["status"] === "Drafted")?"selected" : ""; ?>>Drafted</option>
												</select>
											</div>
								        <!-- Values ready to be re-submitted -->
										<input type="hidden" name="id" value="<?php echo $player['id'] ?>">
										<input type="hidden" name="name" value="<?php echo $player['name'] ?>">
										<input type="hidden" name="position" value="<?php echo $player['position'] ?>">
											<!-- purposely leave out targetDate, its being updated -->
										<input type="hidden" name="team" value="<?php echo $player['team'] ?>">
										<input type="hidden" name="age" value="<?php echo $player['age'] ?>">
										<input type="hidden" name="dateofarticle" value="<?php echo $player['dateofarticle'] ?>">
										<input type="hidden" name="projdraftround" value="<?php echo $player['projdraftround'] ?>">
										<input type="hidden" name="injsus" value="<?php echo $player['injsus'] ?>">
										<input type="hidden" name="href" value="<?php echo $player['href'] ?>">
										<input type="hidden" name="newssrc" value="<?php echo $player['newssrc'] ?>">
										<input type="hidden" name="notes" value="<?php echo $player['notes'] ?>">
										<input type="hidden" name="created_at" value="<?php echo $player['created_at'] ?>">
										
										<!-- update target -->
										<input type="submit" name="contacted" value="Contacted" class="btn btn-success">
										<form method="POST" action="<?php echo 'http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'' ?>">
														<!-- Delete this post -->
												<input type="hidden" name="delete_id" value="<?php echo $player['id'] ?>">
												<input type="submit" name="delete" value="Delete" class="btn btn-danger">
												
												<!-- Link back to previous page -->
												<a class="btn btn-secondary" href="<?php echo 'http://localhost/FantasyFootballDraft/'; ?>">Back</a>
														
												<!-- Edit this post -->
												<a href="http://localhost/FantasyFootballDraft/php/editpost.php?id=<?php echo $player['id'] ?>" class="btn btn-primary">Edit</a>
										</form>
						</form>
						 
				 </div>
			</div>
		</div>
		
	
	<?php require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/footer.php";?>

