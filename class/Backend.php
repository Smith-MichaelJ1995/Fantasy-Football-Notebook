<?php

	//set eastern time
	date_default_timezone_set('America/New_York');
	
	class Backend {
		
	   public function __construct () {
		   //set ROOT_URL Variables
			define('ROOT_URL','http://localhost/FantasyFootballDraft/');   
	   }
		
	   function openDBConnection()
	   {
			// Create Connection
		    $conn = mysqli_connect('localhost', 'root', '61RandolphDrive', 'fantasyfootballnotebook');
		   
		   // Check Connection
		   if(mysqli_connect_errno())
		   {
			  // Connection Failed
			  echo 'Failed to connect to MYSQL '. mysqli_connect_errno();
		   }
		   
		   return $conn;
		   
	   }
	   
	      //retrieve all records from database	  
       function retAllRecords()
       {
		   //open database connection
		   $conn = $this->openDBConnection();
		   
			//Create query
		   $query = 'SELECT * FROM players ORDER BY projdraftround ASC';
		   
		   //Get result
		   $result = mysqli_query($conn, $query);
		   
		   
		   //Fetch result
		   $entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
		   
		   //close connection
		   mysqli_close($conn);
		   
		   //return entries
		   return $entries;
		 
	   }
	   
	   //delete a record from database
	   function deleteRecord($delete_ID)
	   {
		   $conn = $this->openDBConnection();
		   
		   $query = "DELETE FROM players WHERE id = {$delete_ID}";
		
		   if(mysqli_query($conn, $query))
		   {
				//redirect
				header('Location: http://localhost/FantasyFootballDraft/');
		   } else {
			   echo 'Error: '. mysqli_error($conn);	
		   }
		   
		   //close connection
		   mysqli_close($conn);
		   
	   }
	   
	   function returnSpecifiedContact($id)
	   {
		   //open database connection
		   $conn = $this->openDBConnection();
		   
		   //Create query
		   $query = 'SELECT * FROM players WHERE id = '.$id;
		   
		   //Get result
		   $result = mysqli_query($conn, $query);
		   
		   //Fetch result
		   $record = mysqli_fetch_assoc($result);
		   
		   //Free Result
		   mysqli_free_result($result);
		   
		   //close connection
		   mysqli_close($conn);
		   
		   //return record
           return $record;		   
		   
	   }
	   
	   //Return draft order for current time
	   function returnDraftRecords()
	   {
		   //open database connection
		   $fullDraftList = $this->retAllRecords();
		   
		    //email string to be returned
		   $email_string = "";
		   
		   /*
				<th>Name</th>
					<th>Position</th>
					<th>Team</th>
					<th>Age</th>
					<th>Date Of Article</th>
					<th>Projected Draft Rnd</th>
					<th>Injury Prone <br> (1 - 10 = likely)</th>
					<th>News Source</th>
					<th>Status</th>
					<th>View Data</th>
		   */
		   
		   foreach($fullDraftList as $player){
		      $email_string .= "
				<tr>
					<td>".$player['name']."</td>
					<td>".$player['position']."</td>
					<td>".$player['team']."</td>
					<td>".$player['age']."</td>
					<td>".$player['dateofarticle']."</td>
					<td>".$player['projdraftround']."</td>
					<td>".$player['injsus']."</td>
					<td>".$player['newssrc']."</td>
				</tr>
			  \n";
	       }
		   
		   //return print string
		   return $email_string;
		   
	   }
         
	   function insertRecord($name, $pos, $team, $age, $dateofarticle, $projDraftRound, $injSus, $href, $newssrc, $notes)
	   {
		    //open database connection
		    $conn = $this->openDBConnection();
			
	        //add record to players
			$query = "INSERT INTO players(name, position, team, age, dateofarticle, projdraftround, injsus, href, newssrc, notes, status) VALUES('$name', '$pos', '$team', '$age', '$dateofarticle', '$projDraftRound', '$injSus', '$href', '$newssrc', '$notes', 'Available')";
			
			if(mysqli_query($conn, $query))
			{  
		       //notify of successful query
			   //$page_link = "SELECT * FROM contac WHERE name = '$name'";
		   
			   //Get result
			   //$rec = mysqli_query($conn, $page_link);
			   
			   //Fetch result
			   //$entries = mysqli_fetch_all($rec, MYSQLI_ASSOC);
			   
			   //re-direct to page
		       $query_new_rec = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'fantasyfootballnotebook' AND   TABLE_NAME   = 'players'";
			   
			   if(mysqli_query($conn, $query_new_rec))
			   {
					
		             //Get result
				   $rec = mysqli_query($conn, $query_new_rec);
				   
				   //Fetch result
				   $entries = mysqli_fetch_all($rec, MYSQLI_ASSOC);
				   
				   print_r($entries[0]['AUTO_INCREMENT']);
				   
				   //redirect to new record
				   header('Location: http://localhost/FantasyFootballDraft/php/post.php?id='.($entries[0]['AUTO_INCREMENT'] - 1).'');
			   }
			 
			} 
		    else {
			   echo 'Error: '. mysqli_error($conn);	
			}
		   
		   //close connection
		   mysqli_close($conn);
		   
		   
	   }
	   
	    //update specified record in database
	   function updateRecord($id, $name, $position, $team, $age, $dateofarticle, $projdraftround, $injsus, $href, $newssrc, $notes, $status)
	   {
		   //open database connection
		   $conn = $this->openDBConnection();
			
			//update record in database
			$query = "UPDATE players SET
             		name='$name', 
					position='$position',
					team='$team',
					age='$age',
					dateofarticle='$dateofarticle',
					projdraftround='$projdraftround',
					injsus='$injsus',
					href='$href',
					newssrc='$newssrc',
					notes='$notes',
					status='$status'
		            WHERE id = {$id}";
		
		    
			if(mysqli_query($conn, $query))
			{
				//echo '<script type="text/javascript">eval(alert("Success, '.$name.'\'s record has been updated. You will be notified on '.$this->createTargetDate($timespan).' to contact this person!"));</script>';
				//header('Location: http://localhost/FantasyFootballDraft/');
			} else {
			   echo 'Error: '. mysqli_error($conn);	
			}
			
			//close connection
		   mysqli_close($conn);
		   
	 }
	   
		
	}
?>