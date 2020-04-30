<link rel="icon" type="image/png" href="../../Pictures/Icon.png"/>
<link rel="stylesheet" href="../../CSS/allCSS.css"/>

<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_Connexion_Log_In.png");
    }
</style>

<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Log In</title>
</head>

<br><br>

<!-- TITLE OF THE PAGE -->
<?php require '../../PHP/Components/Button_Mainpage.php'; ?>

<br><br><br>

<div style="height:auto; width:auto; display: flex;">

	<!-- SIGN IN BUTTON -->
	<div style="display: flex; justify-content: center; align-items: center; margin: auto">
		<a href="../../PHP/Pages/Connection_Sign_In.php">
			<div class="Button_Connection">
				<span> Sign In </span> 
			</div>
		</a>
	</div>

	<!-- LOG IN FORM -->
	<div style="margin: auto" class="Form_Connection">

		<form method="post" action="../../PHP/Actions/ActionLogIn.php">
			<div style="margin-right: 50px;margin-left: 50px;"><br><br><br>

				<input
					size ="30"
					type ="email"
					name ="_Email"
					required/>
				<em>- Email</em><br><br><br>

				<input
					size ="30"
					type ="password"
					name ="_Password"
					required/>
				<em>- Password</em><br><br><br><br>
				
				<div style="text-align: center;">
					<input class="pointer" type="submit" value="Log in !"/>
				</div>

				<?php
					// We access the session
					session_start();

					// If there was a failed attempt to login
					if( isset($_SESSION['loginFailed']) ) 
					{
						// We display an error message
						echo '<br><div class="redAlert"> Incorrect credentials ! </div>'; 

						// We free the session value
						unset($_SESSION['loginFailed']);
					}
				?>
			</div>
		</form>
	</div>
</div>