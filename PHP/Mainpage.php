<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../CSS/Background.css"/>


            <!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Main Page</title>
</head>


            <!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../Pictures/Wallpaper_Mainpage.jpg"); 
    }
</style>
 
<?php
            // SIGN IN / LOG IN / DISCONNECT BUTTON
    require 'Button_Connection.php';

    echo "<br><br>";

            // BUTTONS OF THE TITLE PAGE
    require 'Button_Title.php';

            // SORTING BUTTONS
    require 'Button_Sorting.php';

            // NEW SPACESHIP BUTTON
    if(isset($_SESSION["_Is_Admin"]))
    {
        if($_SESSION["_Is_Admin"] == 1) require 'Button_New_Spaceship.php';
    }


    echo "<br><br><br><br><br><br>";


	if(isset($_GET["File_ID"]))
	{
		$_SESSION["_Spaceship_ID"]=$_GET["File_ID"];
		require 'Spaceship_Long_File.php';
	}
	else
	{
		$_SESSION["_Spaceship_ID"] = -1;
		require 'Spaceship_Short_File.php';
	}

     require 'Button_Mainpage.php'; ?>
<br>