<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Address Book</title>
		<meta name= "description" content= "Address Book"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/humanity/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/humanity/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	</head>
	<body>
		<h1 id="main_title">Address Book</h1>
		<div id="login">
<?php 		$this->load->view("partials/flash_message");
?>
			<form action="/Mains/login" method="post">
				<input class="login_input" type="email" name="email" placeholder="Email">
				<input class="login_input"type="password" name="password" placeholder="Password">
				<input class="login_input"type="submit" value="login">
			</form>
			<h3 id="login_note">Please use the below login information for demo purposes and use all uppercase letters for the password</h3>
			<h5 id="login_cred">Email: visitor@visitor.com</h5>
			<h5 id="login_cred">Password: Visitor123!</h5>
		</div>
	</body>
</html>