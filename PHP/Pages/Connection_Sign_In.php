<link rel="icon" type="image/png" href="../../Pictures/Icon.png"/>
<link rel="stylesheet" href="../../CSS/allCSS.css"/>

<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_Connexion_Sign_In.png");
    }
</style>

<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Sign In</title>
</head>

<br><br>

<!-- TITLE OF THE PAGE -->
<?php require '../../PHP/Components/Button_Mainpage.php'; ?>
<br><br><br>

<div style="height:auto; width:auto; display: flex;">

	<!-- SIGN IN FORM -->
	<div style="margin: auto" class="Form_Connection">
		<form method="post" action="../../PHP/Actions/ActionSignIn.php">
			<div style="margin-right: 50px;margin-left: 50px;">

				<input
				size ="30"
				type ="text"
				name ="_First_Name"
				required/>
				<em>- First Name</em><br><br><br>

				<input
				size ="30"
				type ="text"
				name ="_Last_Name"
				required
				onkeyup="javascript:this.value=this.value.toUpperCase();"/>
				<em>- Last Name</em><br><br><br>

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
				<em>- Password</em><br><br>
				
				<div style="text-align: center;">
				<input class="pointer" type="submit" value="Sign in !"/>
				</div>
				
				<?php
					// We access the session
					session_start();

					// If there was a failed attempt to signin
					if( isset($_SESSION['signinFailed']) ) 
					{
						// We display an error message
						echo '<br><div class="redAlert"> Incorrect credentials ! </div>'; 

						// We free the session value
						unset($_SESSION['signinFailed']);
					}
				?>
			</div>
		</form>
	</div>
	
	<!-- LOG IN BUTTON -->
	<div style="display: flex; justify-content: center; align-items: center; margin: auto">
		<a href="../../PHP/Pages/Connection_Log_In.php">
			<div class="Button_Connection">
				<span> Log In </span> 
			</div>
		</a>
	</div>
</div>