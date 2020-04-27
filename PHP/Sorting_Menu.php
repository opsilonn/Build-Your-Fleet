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
	// import the templates for the stylized component
	include 'Component_Templates.php';

	// We declare the categories the user is allow to search by
	$correctCategories = array("Franchise", "Purpose", "Spaceship_Size");

	// If the category we search by isn't unauthorized :
	// Display error message
	if (!in_array($_GET["Sort"], $correctCategories) )
	{
		stylizedComponent("Sorry, but it seems you tried to access unauthorized data...");
	}
	// Otherwise : proceed with the sql query
	else
	{
		// We do our SQL query
		include("Database.php");
		$request = $DATABASE->query("SELECT DISTINCT " . $_GET["Sort"] . " FROM spaceship ORDER BY " . $_GET["Sort"] . ";");
			
		// We add all the unique values returned
		$index = 0;
		while($val = $request->fetch())
		{
			$result[$index] = $val[$_GET["Sort"]];
			$index++;
		}

		// If there is 0 result : we display an error message
		if($index == 0)
		{
			stylizedComponent("Sorry, but it seems we encountered an error with the database...");
		}
		// Otherwise : we display all the buttons
		else
		{
			for($i=0; $i < $index; $i++)
			{
				stylizedComponentWithLink("../PHP/Mainpage.php?Sort=".$_GET["Sort"]."&Search=".$result[$i], $result[$i]);
			}
		}
	}
?>


            <!-- BUTTON TO MAIN PAGE -->
<?php require 'Button_Mainpage.php'; ?>
<br>