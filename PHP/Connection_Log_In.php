<?php
	session_start();
	include("Database.php");

	if(isset($_POST["_Email"]) && isset($_POST["_Password"]))
	{
		$_Email = htmlspecialchars($_POST["_Email"]);
		$_Password = htmlspecialchars($_POST["_Password"]);

		$verification = $DATABASE->prepare("SELECT * FROM customer WHERE Email=? && Password=?");
		$verification->execute(array($_Email, $_Password));

		while($val = $verification->fetch())
		{
			$_SESSION['_ID'] = $val['Customer_ID'];
			$_SESSION['_F_Name'] = $val['F_Name'];
			$_SESSION['_L_Name'] = $val['L_Name'];
			$_SESSION['_Email'] = $val['Email'];
			$_SESSION['_Password'] = $val['Password'];
			$_SESSION['_Galaxy'] = $val['Galaxy'];
			$_SESSION['_System'] = $val['System'];
			$_SESSION['_Planet'] = $val['Planet'];
			$_SESSION['_Address'] = $val['Address'];
			$_SESSION['_Description'] = $val['Description'];
			$_SESSION['_Is_Admin'] = $val['Is_Admin'];
			header("Location: Mainpage.php", true, 301);
		}
	}
?>

<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../CSS/Button_Connection.css"/>
<link rel="stylesheet" href="../CSS/Button_Small.css"/>
<link rel="stylesheet" href="../CSS/Form_Connection.css"/>
<link rel="stylesheet" href="../CSS/Background.css"/>

<style>
    body, html
    {
        background-image: url("../Pictures/Wallpaper_Connexion_Log_In.png");
    }
</style>

            <!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Log In</title>
</head><br><br>

            <!-- TITLE OF THE PAGE -->
<?php require 'Button_Mainpage.php'; ?>


      	     <!-- SIGN IN FORM -->
<div style="margin-left:auto;
margin-right: 8%;
margin-top: 50px;
margin-bottom:auto;"
class="Form_Connection">

	<form method="post" action="Connection_Log_In.php">
		<p style="margin-left: 75px;"><br><br><br>

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
			<input type="submit" value="Submit"/>
			</div>
		</p>
	</form>
</div>

<div style="height:auto; width:auto; display: flex;">

        <!-- SIGN IN BUTTON -->
    <a href="Connection_Sign_In.php"
    	style="margin-left:15%;
		margin-right: auto;
		margin-top :100px;
		margin-bottom:auto;">
		
		<div 
		class="Button_Connection">
		<span> Sign In </span> 
		</div>
	</a>

         <!-- LOG IN BUTTON -->
    <a href="Connection_Log_In.php"
    	style="margin-right:15%;
	    margin-left: auto;
	    margin-top : 100px;
	    margin-bottom:auto;">	

	    <div class="Button_Connection">
		 <span> Log In </span> 
		</div>
	</a>
</div>