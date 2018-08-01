<?php //include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php"; 
?>
	
<script type="text/javascript">
		
		function showSuggestion(str, optradio)
		{
	
			if(str.length == 0)
			{
				document.getElementById('output').innerHTML = '';
			}
			else
			{
				//AJAX REQ
				     var xmlhttp = new XMLHttpRequest();
				     xmlhttp.onreadystatechange = function(){
					 if(this.readyState == 4 && this.status == 200) {
						 document.getElementById('output').
						  innerHTML = this.responseText;
                          console.log('str = ' + str + '; optradio = ' + optradio); 						  
					 } else {
						//console.log('failed connection'); 
				     }
						
					}
				 
					xmlhttp.open("GET", "http://localhost/FantasyFootballDraft/php/suggest.php?q="+str+"&t="+optradio, true);
					xmlhttp.send();
			}
		}
	
</script>

<div class="container">
        
  <!-- Content here -->
	    <h1 align="center">NFL Players Directory</h1>
		
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin: 1%; text-align: center;">
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio1">
				<input type="radio" class="form-check-input" id="radio1" name="optradio" value="name">Name
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio2">
				<input type="radio" class="form-check-input" id="radio2" name="optradio" value="position">Position
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio3">
				<input type="radio" class="form-check-input" id="radio3" name="optradio" value="team">Team
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio4"> 
				<input type="radio" class="form-check-input" id="radio4" name="optradio" value="age">Age
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio5">
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="d-e">Publish Date
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio6"> 
				<input type="radio" class="form-check-input" id="radio6" name="optradio" value="projectedDraftRound">Projected Draft Round
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio7"> 
				<input type="radio" class="form-check-input" id="radio7" name="optradio" value="media">Media Source
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio8"> 
				<input type="radio" class="form-check-input" id="radio8" name="optradio" value="inj">Inj Prone (1 = Least, 10 = Most)
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio9"> 
				<input type="radio" class="form-check-input" id="radio9" onclick="showSuggestion('show','order')" name="optradio" value="all">Draft Order
			  </label>
			</div>
			<br>
			<input type="text" id="query-record" onkeyup="showSuggestion(this.value,optradio.value)" style="margin: 1%;" placeholder="Begin Typing Text Here To View Data" class="form-control">
			<!--<p>Suggestions: <span id="output" style="font-weight: bold;"></span></p>-->
		</form>
	
	<div class="table-responsive">
		<p id="selectedNameDisplay" align="center" style="color: red; font-size: 20px;"><i>Please enter data above, and results will populate below..</i></p>
			<table style="background-color: #777;" class="table" style="text-align:center;"> 
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
					<th>Status</th>
					<th>View Data</th>
				  </tr>
			   </thead>
				<tbody id="output"></tbody>
			</table>
		
	</div>

</div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/footer.php";?>