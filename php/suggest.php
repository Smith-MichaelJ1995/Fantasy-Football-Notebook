<?php

	//include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/class/Backend.php";
	
	//Create object Contact_Map
	$NFLplayers = new Backend();
	
	/*//retrieve all records for display */
	$players = $NFLplayers->retAllRecords();
	/**/
	
	//get query string
	$text = $_REQUEST['q'];
	$option = $_REQUEST['t'];
	
	//TEST DATA SENT TO SERVER PAGE
	//echo 'text query = '.$text;
	//echo 'radio option = '.$option;
	
	
	
	//instantiate suggestion string
	$suggestion = "";
	
	// Get Suggestions
   if($text !== "" && $option !== ""){
	   
	   //convert query string to lowercase
	   $text = strtolower($text);  
	   $len = strlen($text);
	   
	   
	   //traverse through list of contacts
	   foreach($players as $player){
		   
		   switch ($option) {
				case "name":
					   if(stristr($text, substr($player['name'], 0, $len)))  //stristr finds first occurance of string in an array
					   {   
					       $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
						
					   }
					break;
				case "position":
					   
					   if(stristr($text, substr($player['position'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
							$suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
					break;
				case "team":
					   if(stristr($text, substr($player['team'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						   $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
						
					   }
					break;
				case "age":
					if(stristr($text, substr($player['age'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						  $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
					break;
				case "d-e":
					if(stristr($text, substr($player['dateofarticle'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						   $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
					break;
				case "projectedDraftRound":
					if(stristr($text, substr($player['projdraftround'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						   $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
					break;
				case "media":
					if(stristr($text, substr($player['newssrc'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						   $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
					break;
				case "inj":
					if(stristr($text, substr($player['injsus'], 0, $len)))  //stristr finds first occurance of string in an array
					   {
						   $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
					   }
				break;
				case "order":
				//show all records
					   //print <tr> tag if neccessary
						   //print <tr>
						  $suggestion .= '<tr>';
						  
							   $suggestion .= '<td>
													'.$player['name'].'
											   </td>
											   <td>
													'.$player['position'].'
											   </td>
												<td>
													'.$player['team'].'
												</td>
												<td>
													'.$player['age'].'
												</td>
												<td>
													'.$player['dateofarticle'].'
												</td>
												<td>
													'.$player['projdraftround'].'
												</td>
												<td>
													'.$player['injsus'].'
												</td>
												<td>
													'.$player['newssrc'].'
												</td>
												<td>
													'.$player['status'].'
												</td>
												<td>
													<a href="http://localhost/FantasyFootballDraft/php/post.php?id='.$player['id'].'"><button class="btn btn-success">'.$player['name'].'</button></a>
												</td>
												';
												//add links to view player and available status
							
						$suggestion .= '</tr>';
						
					break;
					
			}
			
	   }
   }

   
   echo $suggestion === "" ? "No Suggestion" : $suggestion;
?>