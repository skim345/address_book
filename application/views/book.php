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
		<div id="favorites">
			<p>Favorites</p>
			<table class="table1">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Address Cont.</th>
						<th>City</th>
						<th>State</th>
						<th>Zip Code</th>
						<th>Remove Favorite</th>
				</tr>
				</thead>
				<tbody>
<?php
					foreach($favorites as $favorite)
					{
						echo "<tr>
						<td>".$favorite['first_name']."</td>
						<td>".$favorite['last_name']."</td>
						<td>".$favorite['phone']."</td>
						<td>".$favorite['email']."</td>
						<td>".$favorite['address1']."</td>
						<td>".$favorite['address2']."</td>
						<td>".$favorite['city']."</td>
						<td>".$favorite['state']."</td>
						<td>".$favorite['zip']."</td>
						<td><a href='/Books/delete_favorite/".$favorite['id']."'>Remove from favorites</a></td>
						</tr>";
					}
?>
				</tbody>
			</table>
		</div>
		<div id="contacts">
			<p>Contacts</p>
			<table class="table1">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Address Cont.</th>
						<th>City</th>
						<th>State</th>
						<th>Zip Code</th>
						<th>Add to Favorites</th>
						<th>Delete Contact</th>
				</tr>
				</thead>
				<tbody>
<?php
					foreach($contacts as $contacts){
						echo "<tr><td>".$contacts['first_name']."</td>
						<td>".$contacts['last_name']."</td>
						<td>".$contacts['phone']."</td>
						<td>".$contacts['email']."</td>
						<td>".$contacts['address1']."</td>
						<td>".$contacts['address2']."</td>
						<td>".$contacts['city']."</td>
						<td>".$contacts['state']."</td>
						<td>".$contacts['zip']."</td>
						<td><a href='/Books/add_favs/".$contacts['id']."'>Add to favorites</a></td>
						<td><a href='/Books/delete_contact/".$contacts['id']."'>Remove contacts</a></td></tr>";
					}
?>
				</tbody>
			</table>
		</div>
		<div id="new_contacts">
			<form id="new_contact" action="/Books/add_contact" method="post">
				<label for="first_name">First Name</label>
				<input type="text" name="first_name">
				<label for="last_name">Last Name</label>
				<input type="text" name="last_name">
				<label for="phone">Phone Number</label>
				<input type="text" name="phone">
				<label for="email">Email</label>
				<input type="email" name="email">
				<label for="address1">Address</label>
				<input type="text" name="address1">
				<label for="address2">Address cont.</label>
				<input type="text" name="address2">
				<label for="city">City</label>
				<input type="text" name="city">
				<label for="state">State</label>
				<input type="text" name="state">
				<label for="zip">Zip Code</label>
				<input type="text" name="zip">
				<input id="submit_btn" type="submit" value="Add Contact">
			</form>
		</div>
	</body>
</html>