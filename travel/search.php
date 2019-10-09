<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/search.css">
</head>
<body>
	<div id="app">
		<select class="browser-default custom-select custom-select-lg mb-3 form-select" name="from" @change="change">
			<option value="1">Search By From To Date</option>
			<option value="0">Search By Date Perioud and company name</option>
		</select>
		<form class="form" action="searcherByFromToDate.php" method="POST" v-show="searchByFromToDate">
			<div class="form-group">
				<label for="from">From</label>
			   	<select class="browser-default custom-select custom-select-lg mb-3" name="from">
				<option selected>Select city</option>
				<?php  require '../helpers/cities.php';?>
				</select>
			</div>
			<div class="form-group">
			<label for="to">To</label>
			<select class="browser-default custom-select custom-select-lg mb-3" name="to">
			  <option selected>Select city</option>
				<?php  require '../helpers/cities.php';?>
			</select>
			</div>
		  <div class="form-group">
		    <label for="time">date</label>
		    <input name="date" type="text" class="form-control" id="time" placeholder="date">
			</div>
			<button type="submit" class="btn btn-warning search-btn">Search</button>
		</form>
		<form class="form" action="searcherByTimePerioudAndComany.php" method="POST" v-show="!searchByFromToDate">
			<div class="form-group">
				<label for="start date">Start Date</label>
				<input name="start date" type="text" class="form-control" id="start date" placeholder="start date">
			</div>
			<div class="form-group">
				<label for="end date">End Date</label>
				<input name="end date" type="text" class="form-control" id="end date" placeholder="end date">
			</div>
			<select class="browser-default custom-select custom-select-lg mb-3" name="company_id">
			  <option selected>Select company</option>
			  	<?php
			  	require '../vendor/autoload.php';
			  	use Redis\Redis;
			  	$redis=Redis::connect();
			  	$companies=$redis->get('companies');
			  	if (is_null($companies)) {
			  		$companies=[];
			  	}else{
			  		$companies=json_decode($companies, true);
			  	}
			  	?>
				<?php foreach ($companies as $company_id => $cpmpany_data): ?>
					<option value="<?= $company_id ?>"><?= $cpmpany_data['name'] ?></option>
				<?php endforeach ?>
			</select>
			<button type="submit" class="btn btn-warning search-btn">Search</button>
		</form>
	</div>
	<script type="text/javascript" src="../script/vue.js" ></script>
	<script type="text/javascript" src="../script/search.js" ></script>
</body>
</html>