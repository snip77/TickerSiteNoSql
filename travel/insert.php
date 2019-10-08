<?php
	session_start();
	if ( ! isset($_SESSION['username']))
		header('location:../');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Travel</title>
	<link rel="stylesheet" type="text/css" href="../style/insertTravel.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
</head>
<body>
	<div class="title">
		<h2>C</h2>
		<div class="little-title">
			reate
		</div>
		<h2 class="big-title">N</h2>
		<div class="little-title">
			ew
		</div>
		<h2 class="big-title">T</h2>
		<div class="little-title">
			ravel
		</div>
	</div>
	<form class="form" action="inserter.php" method="POST">
	  <div class="form-group">
	    <label for="from">From</label>
	    <select class="browser-default custom-select custom-select-lg mb-3">
		  <option selected>Open this select menu</option>
		  <option value="1">One</option>
		  <option value="2">Two</option>
		  <option value="3">Three</option>
		</select>
	    <input name="from" type="text" class="form-control" id="from" placeholder="From">
	  </div>
	  <div class="form-group">
	    <label for="to">To</label>
	    <input name="to" type="text" class="form-control" id="to" placeholder="To">
	  </div>
	  <div class="form-group">
	    <label for="time">time</label>
	    <input name="time" type="text" class="form-control" id="time" placeholder="time">
	  </div>
	  <div class="form-group">
	    <label for="price">price</label>
	    <input name="price" type="text" class="form-control" id="price" placeholder="price">
	  </div>
	  <div class="form-group">
	    <label for="capacity">capacity</label>
	    <input name="capacity" type="text" class="form-control" id="capacity" placeholder="capacity">
	  </div>
	  <button type="submit" class="btn btn-warning create-btn">Create</button>
	</form>
</body>
</html>