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
		 //SIGN IN / LOG IN / DISCONNECT BUTTON
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
?>

<br><br><br><br><br><br>


<?php 
	$index = 0;

	if($_GET["Sort"] == 'Purpose')
	{
		$A[0] = "Civil";
		$A[1] = "Company";
		$A[2] = "Military";
		$A[3] = "Personal";
		$A[4] = "Scientific";
		$index = 5;
	}
	else if($_GET["Sort"] == 'Spaceship_Size')
	{
		$A[0] = "Satellite";
		$A[1] = "Individual Spaceship";
		$A[2] = "Shuttle";
		$A[3] = "Frigate";
		$A[4] = "Cruiser";
		$A[5] = "Space Station";
		$index = 6;
	}
	else
	{
		include("Database.php");

		if($_GET["Sort"] == 'Franchise') $request = $DATABASE->query("SELECT DISTINCT Franchise FROM spaceship;");

		$index = 0;
		while($val = $request->fetch())
		{
			$A[$index] = $val[$_GET["Sort"]];
			$index++;
		}
		sort($A);
	}


	for($i=0; $i < $index; $i++)
	{
		echo "
		<div style=\"

		font-family: Pikmin;
		text-align: center;

		font-size: 48px;
		letter-spacing: 2px;
		text-shadow: 3px 2px rgba(34,42,53,1);
		color: rgba(255,255,255,1);
		width: 700px;
		margin-left: auto;
		margin-right: auto;\">

			<a style=\"text-decoration: none;\"
			href=\"../PHP/Mainpage.php?Sort=".$_GET["Sort"]."&Search=".$A[$i]."\">
				<div style=\"
				background-color: rgba(34,42,53,0.9);
		    	border:4px solid rgba(0,0,0,1);
		    	border-radius:40px;
		    	display:normal;
		    	\">

		    		".$A[$i]."
		    	</div>
	    	</a>

		</div><br>";
	}
?>


            <!-- BUTTON TO MAIN PAGE -->
<?php require 'Button_Mainpage.php'; ?>
<br>