<?php
	session_start();
	include("Database.php");

	if(isset($_POST["_First_Name"]))
	{
		$indicator = true;
		$_Email = htmlspecialchars($_POST["_Email"]);

		$verification = $DATABASE->prepare("SELECT * FROM customer WHERE Email=?");
		$verification->execute(array($_Email));

		while($val = $verification->fetch())
			$indicator = false;
	
		if($indicator)
		{
			$_SESSION["_First_Name"] = $_POST["_First_Name"];
			$_SESSION["_Last_Name"] = $_POST["_Last_Name"];
			$_SESSION["_Email"] = $_POST["_Email"];
			$_SESSION["_Password"] = $_POST["_Password"];

			header("Location: New_Customer.php", true, 301);
		}
		else
			echo"Please enter an unused Email !!!";
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
        background-image: url("../Pictures/Wallpaper_Connexion_Sign_In.png");
    }
</style>

            <!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Sign In</title>
</head><br><br>
            <!-- TITLE OF THE PAGE -->
<?php require 'Button_Mainpage.php'; ?>


      	     <!-- SIGN IN FORM -->
<div style="margin-left:8%;
margin-right: auto;
margin-top: 50px;
margin-bottom:auto;"
class="Form_Connection">

	<form method="post" action="Connection_Sign_In.php">
		<p style="margin-left: 75px;">

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