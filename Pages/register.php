<?php
	include_once '../scripts/header.php';
?>

<link rel="stylesheet" type="text/css" href="../stylesheets/register_style.css">

<section class="main-container">

	<div class="main-wrapper">

		<h2>Register</h2>

        <form class="register-form" action="../includes/include-register.php" method="POST">

            <input type="text" name="firstname" placeholder="First Name">

            <input type="text" name="lastname" placeholder="Last Name">

            <input type="text" name="email" placeholder="E-Mail">

            <input type="text" name="username" placeholder="Username">

            <input type="password" name="password" placeholder="Password">

            <button type="submit" name="submit">Register</button>

        </form>
	</div>

</section>

<?php
	include_once '../scripts/footer.php';
?>