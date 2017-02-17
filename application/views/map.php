<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Address Book</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	</head>
	<body>
		<div id="top_nav">
			<a href="/Books/index">Contacts</a>
			<a href="/Maps/index">Directions</a>
			<a href="/Mains/logoff">Logoff</a>
		</div>
<?php 		$this->load->view("partials/flash_message");
?>
		<div id="map">
			<form id="map_form" action="/Maps/directions" method="post">
				<label for="starting_address">Enter a starting address</label>
				<input type="text" name="starting_address">
				<label for="destination">Destination From Contacts</label>
				<select name="contact">
					<option></option>
	<?php 
					foreach($contacts as $contact){
						echo "<option>".$contact['first_name']." ".$contact['last_name']."</option>";
					}
	?>
				</select>
				<input id="submit_btn" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>