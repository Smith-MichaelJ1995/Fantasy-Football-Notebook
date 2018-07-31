<?php //include functions on page
	require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/header.php"; ?>
	
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
                          //console.log('str = ' + str + '; optradio = ' + optradio); 						  
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
        
		<div class="row">
			<div class="col-lg-12" align="center" style="margin-top: 1%; margin-bottom: 0%;">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTon7rQB8vihOY6fw-0P7VTGmvJa1DV1KuAXaLbm5rHn7_LAEzg" class="mx-auto">
			</div>
		</div>
        
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
			  <label class="form-check-label" for="radio5"> 
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="age">Age
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio3">
				<input type="radio" class="form-check-input" id="radio3" name="optradio" value="d-e">Date/Entry
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio5"> 
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="projectedDraftRound">Projected Draft Round
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio5"> 
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="media">Media Source
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio5"> 
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="inj">Inj Prone (1 = Least, 10 = Most)
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label" for="radio5"> 
				<input type="radio" class="form-check-input" id="radio5" onclick="showSuggestion('test',optradio.value)" name="draftOrder" value="all">Draft Order
			  </label>
			</div>
			<br>
			<input type="text" id="query-record" onkeyup="showSuggestion(this.value,optradio.value)" style="margin: 1%;" placeholder="Begin Typing Text Here To View Data" class="form-control">
			<!--<p>Suggestions: <span id="output" style="font-weight: bold;"></span></p>-->
		</form>
	
	<div class="table-responsive">
		<p id="selectedNameDisplay" align="center" style="color: red; font-size: 20px;"><i>Please select a contact below</i></p>
			<table style="background-color: #777;" class="table" style="text-align:center;">  <!--id="output"-->
			   <thead>
				  <tr>
					<th>Name</th>
					<th>Position</th>
					<th>Team</th>
					<th>Age</th>
					<th>Date/Entry</th>
					<th>Projected Draft Rnd</th>
					<th>Media Source</th>
					<th>Inj Rating</th>
				  </tr>
			   </thead>
				<tbody>
					  <tr>
						<td>Tom Brady</td>
						<td>QB</td>
						<td>Patriots</td>
						<td>Age</td>
						<td>07-30-2018</td>
						<td>5</td>
						<td>ESPN</td>
						<td>2</td>
					  </tr>
					  <tr>
						<td>Tom Brady</td>
						<td>QB</td>
						<td>Patriots</td>
						<td>Age</td>
						<td>07-30-2018</td>
						<td>5</td>
						<td>ESPN</td>
						<td>2</td>
					  </tr>
					  <tr>
						<td>Tom Brady</td>
						<td>QB</td>
						<td>Patriots</td>
						<td>Age</td>
						<td>07-30-2018</td>
						<td>5</td>
						<td>ESPN</td>
						<td>2</td>
					  </tr>
							
				</tbody>
			</table>
		
	</div>

</div>



<?php require $_SERVER["DOCUMENT_ROOT"]."/FantasyFootballDraft/includes/footer.php";?>