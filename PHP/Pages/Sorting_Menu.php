<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../CSS/allCSS.css"/>

<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Main Page</title>
</head>


<!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_Mainpage.jpg"); 
    }
</style>

<?php
    // We get the Header
    require '../../PHP/Components/Header.php';
?>


<?php
	// import the templates for the stylized component
	include '../../PHP/Components/Component_Templates.php';

	// We declare the categories the user is allow to search by
	$correctCategories = array("Franchise", "Purpose", "Spaceship_Size");

	// If the category we search by isn't unauthorized :
	// Display error message
	if (!in_array($_GET["Sort"], $sortBy) )
	{
		stylizedComponent("Sorry, but it seems you tried to access unauthorized data...");
	}
	// Otherwise : proceed with the sql query
	else
	{
		// We do our SQL query
		include("../../PHP/Utils/Database.php");
		include("../../PHP/Utils/Util.php");

		switch ( $_GET["Sort"] )
		{
			case $sortBy["Purpose"] : 
				$results = $allowedPurposes;
				break;

			case $sortBy["Size"] :
				$results = $allowedSizes;
				break;
			
			case $sortBy["Franchise"] :
				$request = $DATABASE->query("SELECT DISTINCT Franchise FROM spaceship ORDER BY Franchise;");
				
				// We add all the unique values returned
				$index = 0;
				while($val = $request->fetch())
				{
					$results[$index++] = $val[$_GET["Sort"]];
				}
				break;
		}

		
		// If there is 0 result : we display an error message
		if(count($results) == 0)
		{
			stylizedComponent("Sorry, but it seems we encountered an error with the database...");
		}
		// Otherwise : we display all the buttons
		else
		{
			foreach ($results as $value)
			{
				stylizedComponentWithLink("../../PHP/Pages/Mainpage.php?Sort=".$_GET["Sort"]."&Search=".$value, $value);
			}
		}
	}



	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
?>


<!-- BUTTON TO MAIN PAGE -->
<?php require '../../PHP/Components/Button_Mainpage.php'; ?>
<br>