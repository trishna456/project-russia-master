<?php

if (!session()->has('profileid')) {
    redirect()->back();
}
?>
<html lang="en">

<head>
	<title> IoT User Preferences </title>
	<link rel="icon" href="https://assets.iu.edu/favicon.ico">
	
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body onload="onPageLoad()">
	<!-- body code goes here -->
	<div class="container">
		<div class="alert alert-primary mt-2 pb-0 text-sm text-left" role="alert">
			<p class="col-12">
				<span>
                    Here each card presents a an image related to the Russia-Ukraine war. 
                    <b>Please indicate whether you think the image is pro-War or anti-War by sorting it into one of the 2 boxes!</b></span>
				<div style="display:<%out.print(displayUndo);%>" class="pl-3">
					<span id="Dashboard"></span>
					<button onclick="undoSort()" id="undo" class="btn btn-secondary btn-sm ml-3" style="visibility: hidden;">Undo</button>
				</div>
			</p>
			<div class="progress mt-1 ml-2 mb-3" style="height: 20px">
				<div id="ProgressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%;"
					aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<div class='row' style="height:800px; width: 1100px;">
			<div class="col-8" id="BoundingBox" style="height:800px; width: 1100px; position: relative;">
				<div id="AntiWar" class="card border-info small mt-1" style="position: absolute; width: 14rem; height:12rem; left:3%">
					<div class="card-body">
						<h5 class="card-title">Anti-War</h5>
					</div>
				</div>

				<div id="War" class="card border-info small mt-1" style="position: absolute; width: 14rem; height:12rem; right:0.1%">
					<div class="card-body">
						<h5 class="card-title">War</h5>
					</div>
				</div>

				<div id="draggable" class="shadow card border-info small" style="position:absolute; width: 13.5rem; top:15%; left:37%; cursor: move;">
					<div id="CardName" class="card-header">
						
					</div>
					<div class="card-body">
						<p id="cardDescription" class="card-text"> Here we will present the participants with the description of the card.</p>
					</div>
				</div>
				<div id="doneCard" class="shadow card text-white bg-success small" style="position:absolute; width: 13.5rem; top:15%; left:37%; visibility: hidden;">
					<div class="card-header">You are Done!</div>
					<div class="card-body">
						<p class="card-text">Please move onto the next activity.</p>
						<form name="SortingStatus" method="post" action="SortingStatus">
							<input type="submit" class="btn btn-primary btn-sm" value="Continue">
							<input  type="text" name="SortingStatus" value="Done" style="display: none;">
							<input  type="text" name="SortingType" value="Benefit" style="display: none;">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="js/draggable_features_benefit.js"></script>
</body>

