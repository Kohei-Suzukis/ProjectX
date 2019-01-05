<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="../stylesheets/index_style.css">
	</head>
	<body>
		<header>
			<nav>
				<div class="main-wrapper">
					<ul>

						<li><a href="index.php">Home</a></li>
											
					</ul>				
					<ul>
					
						<li><a href="roomchat.php">General Chat</a></li>
						
					</ul>
					
					<div class="login-form">
						<form action="../includes/include-login.php" method="POST">

							<input type="text" name="userid" placeholder="Username/E-Mail">

							<input type="password" name="password" placeholder="Password">

							<button type="submit" name="submit">Login</button>

						</form>

						<a href="register.php">Register</a>

					</div>
				</div>		
			</nav>
		</header>
