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
			   
			   //re-direct to post page
			   header('Location: http://localhost/FantasyFootballDraft/');
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